<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
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
        if($exception instanceof MethodNotAllowedHttpException){
            $ecode = 'You hacker! :)';
            $msg = "This incident will be reported to admin right now, you better run";
            return response()->view('errors.error',compact('ecode','msg'),$exception->getStatusCode());
        }
        if($this->isHttpException($exception)){
            $ecode = $exception->getStatusCode() . ' :(';
            if($exception->getStatusCode() == 404){
                $msg = "We cannot find /" . $request->path() . " page! " . "Let us bring you back";
            }else if($exception->getStatusCode() == 403 && !isset($_SERVER['HTTP_REFERER'])){
                $msg = "You haven't login yet! Do not be a hacker please :)";
            }else if($exception->getStatusCode() == 403 && isset($_SERVER['HTTP_REFERER'])){
                return redirect('/login');
            }
            return response()->view('errors.error',compact('ecode','msg'),$exception->getStatusCode());
        }
        return parent::render($request, $exception);
    }
}
