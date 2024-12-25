<?php

declare(strict_types=1);

namespace Amc;

final class FooUpService implements UpServiceInterface
{
    private ?FooParams $params = null;

    public function __construct() {
        // default params
        $this->params = new FooParams();
    }

    public function doSomething(FooParams $params): void
    {
        $this->params = $params;
    }

    public function getSomething(): ?FooParams
    {
        return $this->params;
    }
}
