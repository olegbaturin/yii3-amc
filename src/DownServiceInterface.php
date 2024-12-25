<?php

declare(strict_types=1);

namespace Amc;

use Psr\Http\Message\ServerRequestInterface;

interface DownServiceInterface
{
    public function doSomething(ServerRequestInterface $request, FooParams $params): ServerRequestInterface;

    public function getSomething(ServerRequestInterface $request): ?FooParams;
}
