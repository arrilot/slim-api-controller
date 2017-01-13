<?php

namespace Arrilot\SlimApiController;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Interfaces\InvocationStrategyInterface;

class OnlyArgsStrategy implements InvocationStrategyInterface
{
    /**
     * Invoke a route callable without request and response,
     *
     * @param array|callable         $callable
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     * @param array                  $routeArguments
     *
     * @return mixed
     */
    public function __invoke(
        callable $callable,
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $routeArguments
    ) {
        return call_user_func_array($callable, $routeArguments);
    }
}
