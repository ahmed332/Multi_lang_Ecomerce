<?php

namespace App\Http\Middleware;
use Request;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request as HttpRequest;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            //or /admin*
            if ((Request::is(app()->getLocale().'/admin')) or (Request::is(app()->getLocale().'/admin/*'))) //start with admin 
                return route('admin.login');
            else
                return route('login');

        }

    }
}
