<?php

namespace App\Exceptions;
use App\Traits\ApiResponser;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //\Illuminate\Validation\ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    // public function render($request, Exception $exception)
    // {
    //   if($exception instanceof ValidationException)
    //   {
    //     return $this->convertValidationExceptionResponse($exception,$request);
    //   }
    //
    //   if($exception instanceof MethodNotAllowedHttpException)
    //   {
    //
    //   }
    //
    //   // if($exception instanceof ModelNotFoundException){
    //   //
    //   // }
    //   return parent::render($request,$exception);
    // }
    //
    // protected function convertValidationExceptionResponse(ValidationException $e, $request)
    // {
    //   $error = $e->validator->error()->getMessage();
    //   return $this->errorResponse($error, 422);
    // }

}
