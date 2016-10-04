<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('dashboard/login');
//                return Redirect::back()->withInput()->with('message', 'Your email or password are incorrect.');                
//                return Redirect::route('dashboard/login')->withFlashMessage('Your email or password are incorrect.'); 
//                Session::flash('flash_message', 'This is a message!'); 
//                Session::flash('alert-class', 'alert-danger'); 
//                return Redirect::to('dashboard/login')->with('flash_message', 'Your email or password are incorrect.'); 
            }
        }

        return $next($request);
    }
}
