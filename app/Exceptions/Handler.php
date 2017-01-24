<?php

namespace KC\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if(! $request->expectsJson()) {
          return parent::render($request, $e);
        }
        return $this->renderJson($e);
    }
    /**
      * Render an exception into an HTTP response in Json
      * @param \Exception $e
      * @return \Illuminate\Http\Response
      */
    private function renderJson(Exception $e)
    {
        if($e instanceof ModelNotFoundException) {
          return $this->responseJson($e->getMessage(), 404);
        }
        if($e instanceof HttpException) {
          return $this->responseJson($e->getMessage(), $e->getStatusCode());
        }
        return $this->responseJson($e->getMessage(), 500);
    }
    /**
     * Format a json response
     * @param string $message
     * @param int    $code
     * @return \Illuminate\Http\Response
     */
    private function responseJson($message, $code = 500) {
        return response()->json([
          'ok' => false,
          'message' => $message
        ], $code);
    }
    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $e
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $e)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest('login');
    }
}
