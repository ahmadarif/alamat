<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $data = [];
        $responseType = null;
        $isCustomError = false;

        if ($exception instanceof ValidationException) {
            $isCustomError = true;
            $data['message'] = 'Validasi error';
            $data['error'] = $exception->validator->errors();
            $responseType = Response::HTTP_BAD_REQUEST;
        } else if ($exception instanceof NotFoundHttpException) {
            $isCustomError = true;
            $data['message'] = 'API tidak tersedia';
            $responseType = Response::HTTP_NOT_FOUND;
        } else if ($exception instanceof MethodNotAllowedHttpException) {
            $isCustomError = true;
            $data['message'] = 'API tidak tersedia';
            $responseType = Response::HTTP_METHOD_NOT_ALLOWED;
        } else if ($exception instanceof ModelNotFoundException) {
            $isCustomError = true;
            $data['message'] = 'Data tidak ditemukan';
            $responseType = Response::HTTP_NO_CONTENT;
        } else if ($exception instanceof QueryException) {
            $isCustomError = true;
            $data['message'] = 'Terjadi kesalahan internal';
            $responseType = Response::HTTP_INTERNAL_SERVER_ERROR;

            if (config('app.debug')) {
                $data['error'] = $exception->getMessage();
            }
        } else if ($exception instanceof AuthorizationException) {
            $isCustomError = true;
            $data['message'] = 'Anda tidak memiliki ijin pada request ini';
            $responseType = Response::HTTP_UNAUTHORIZED;
        }

        if ($isCustomError) {
            return response()->json($data, $responseType);
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->json(['message' => 'Anda tidak terautentikasi, silahkan login'], Response::HTTP_UNAUTHORIZED);
    }

}