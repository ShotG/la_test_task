<?php

use src\Manufacture\Bakery\Bakery;
use src\Entity\BaseRequest;

function myAutoLoad($className)
{
    $classPieces = explode("\\", $className);
    switch ($classPieces[0]) {
        case 'src':
            include __DIR__ .'/'. implode(DIRECTORY_SEPARATOR, $classPieces) . '.php';
            break;
    }
}
spl_autoload_register('myAutoLoad', '', true);

if (php_sapi_name() === "cli") {
    if ($argc == 1) {
        echo "USAGE:\n\t $argv[0] <PRODUCT> <OPTION>\n";
    } else {
        $productName = $argv[1];
        $productOptions = [];

        if ($argc > 2) {
            for ($i = $argc; $i > 2;  $i--) {
                $productOptions[] = $argv[$i - 1];
            }
        }

        $request = new BaseRequest($productName, $productOptions);
        $bakery = new Bakery();

        try {
            $product = $bakery->produce($request);

            if (!$product->isCompleted()) {
                throw new \Exception( 'an error occurred');
            }

            echo ucfirst($product->getName()) . " completed\n";
        } catch (Exception $e) {
            fwrite(STDERR,'"' . ucfirst($request->getProductName()) . '" was not completed because of ' .
                $e->getMessage() . "\n");
        }
    }
}
