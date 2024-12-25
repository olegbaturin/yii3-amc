<?php

declare(strict_types=1);

namespace Amc;

use Psr\Http\Message\ServerRequestInterface;

final class FooDownService implements DownServiceInterface
{
    const KEY = '__fooAttributeKey';

    public function doSomething(ServerRequestInterface $request, FooParams $params): ServerRequestInterface
    {
        return $request->withAttribute(self::KEY, $params);
    }

    public function getSomething(ServerRequestInterface $request): FooParams
    {
        return $request->getAttribute(self::KEY);
    }
}
