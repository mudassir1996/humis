<?php

namespace App\Exceptions;

use Exception;
use App\Http\Controllers\CommonController;

class ApiAuthExceptionHandler extends Exception
{
    public function __construct()
    {
        $this->common = new CommonController();
    }
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        
        $this->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            if ($request->is('api/*')) {
                return $this->common->ResponseHandler('fail', 'Invalid Token',[]);
            }
        });
    }
}
