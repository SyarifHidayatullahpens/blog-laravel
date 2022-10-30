<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Auth;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function redirectTo()
    {
        // return response()->json('hello');
        if(Auth::check()) {
            // return \App\Http\Middleware\AdminMiddleware::class;
            return response()->json('login');
        } else {
            return response()->json('tidak butuh login');
            // return route('/blog.*');
        }
    }

}
