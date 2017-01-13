<?php

namespace Arrilot\SlimApiController;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

abstract class ApiController
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var ServerRequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;
    
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * ApiController constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->request = $container->get('request');
        $this->response = $container->get('response');
        $this->logger = $container->get('logger');
    }

    /**
     * Respond with error message and code.
     *
     * @param string $message
     * @param int $code
     * @return ResponseInterface
     */
    protected function respondWithError($message = 'No specific error message was specified', $code = 400)
    {
        $json = [
            'error' => [
                'http_code' => $code,
                'message'   => $message,
            ]
        ];
        
        return $this->response->withStatus($code)->withJson($json);
    }

    /**
     * 403 error.
     *
     * @param string $message
     * @return ResponseInterface
     */
    protected function errorForbidden($message = 'Forbidden')
    {
        return $this->respondWithError($message, 403);
    }

    /**
     * 500 error.
     *
     * @param string $message
     * @return ResponseInterface
     */
    protected function errorInternalError($message = 'Internal Error')
    {
        return $this->respondWithError($message, 500);
    }

    /**
     * 404 error
     *
     * @param string $message
     * @return ResponseInterface
     */
    protected function errorNotFound($message = 'Resource Not Found')
    {
        return $this->respondWithError($message, 404);
    }

    /**
     * 401 error.
     *
     * @param string $message
     * @return ResponseInterface
     */
    protected function errorUnauthorized($message = 'Unauthorized')
    {
        return $this->respondWithError($message, 401);
    }

    /**
     * 400 error.
     *
     * @param string$message
     * @return ResponseInterface
     */
    protected function errorWrongArgs($message = 'Wrong Arguments')
    {
        return $this->respondWithError($message, 400);
    }

    /**
     * 501 error.
     *
     * @param string $message
     * @return ResponseInterface
     */
    protected function errorNotImplemented($message = 'Not implemented')
    {
        return $this->respondWithError($message, 501);
    }
}
