<?php

declare(strict_types=1);

namespace Amc;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class FooAction
{
    public function __construct(
        private DownServiceInterface $fooDownService,
        private UpServiceInterface $fooUpService,
        private ResponseFactoryInterface $responseFactory,
    ) {}

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $fooDownParams = $this->fooDownService->getSomething($request);

        $response = $this->responseFactory->createResponse();

        $fooUpParams = new FooParams();
        $this->fooUpService->doSomething($fooUpParams);

        return $response;
    }
}
