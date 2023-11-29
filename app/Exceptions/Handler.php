<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception\InvalidOrderException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            if ($request->is('api/*')) {
                if (Auth::check()){
                    if(!(Auth::user()->role == 1)){
                        return response()->json([
                            'message' => 'Unauthorized'
                        ], 401);
                    }
                }
            }
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Not Found'
                ], 404);
            }
        });


        $this->renderable(function (InvalidOrderException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Internal Server Error'
                ], 500);
            }
        });
    }
}
