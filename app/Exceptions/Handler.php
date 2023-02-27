<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Register the renderable callback to return json response instead of an html response when there is an error
         */
        $this->renderable(function (Throwable $e, $request) {

            // if the request is an api request and the exception is a validation exception
            if ($e instanceof ValidationException) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'errors' => $e->errors(),
                    'code' => $e->getCode() ?: 400
                ], $e->getCode() ?: 400);
            }


            // return json response instead of an html response when there is an error
            return response()->json([
                'message' => $e->getMessage(),
                'code' => $e->getCode() ?: 400
            ], $e->getCode() ?: 400);
        });

        /**
         * Register the reportable callback to report the exception to the appropriate log channel.
         */
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
