<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ErrorException;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        ErrorException::class,
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
        //throw $e;
        
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
        //   if($e instanceof FatalThrowableError){
        //       return response()->json([
        //         'error'=>  'undefined function'
            
        //       ]);
        //   }
         if($e instanceof NotFoundHttpException){
             return response()->json([
               'error'=>  'Incorrect Route'
            
             ],404);
         }
         if($e instanceof ErrorException){
            return response()->json([
                'error'=>  'Trying to get property of non object'
             
              ],404);
         }

        if($e instanceof Swift_TransportException){
            return response()->json([
              'error'=>  'couldnt established connection with email '
            
            ]);
        }
        return parent::render($request, $e);
    }
}
