<?php

namespace src\Manufacture;

use src\Entity\BaseRequest;

interface ManufactureInterface
{
    public function produce(BaseRequest $request);
}
