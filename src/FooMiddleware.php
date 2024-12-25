<?php

declare(strict_types=1);

namespace Amc;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class FooMiddleware implements MiddlewareInterface
{
    public function __construct(
        private DownServiceInterface $fooDownService,
        private UpServiceInterface $fooUpService,
    ) {}

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // create and set params down to action
        $fooDownParams = new FooParams();
        $request = $this->fooDownService->doSomething($request, $fooDownParams);

        $response = $handler->handle($request);

        // get and apply params up from action
        $fooUpParams = $this->fooUpService->getSomething();
        $response = $this->applyToResponse($response, $fooUpParams);

        return $response;
    }

    private function applyToResponse($response, FooParams $fooParams): ResponseInterface
    {
        return $response;
    }
}
