<?php

declare(strict_types=1);

namespace Amc;

interface UpServiceInterface
{
    public function doSomething(FooParams $params): void;

    public function getSomething(): ?FooParams;
}
