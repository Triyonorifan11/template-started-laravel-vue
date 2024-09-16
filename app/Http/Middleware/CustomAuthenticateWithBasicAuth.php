<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Http\Request;

class CustomAuthenticateWithBasicAuth
{
    protected $auth;

    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next, $guard = null, ...$roles)
    {
        $authGuard = $this->auth->guard($guard);

        config(['session.expire_on_close' => true]);

        if (!$authGuard->check()) {
            $authGuard->basic('username');
        }

        $roleAuth = $authGuard->user()->role;

        if (count($roles) > 0) {
            if (in_array($roleAuth->slug, ['developer'])) {
                return $next($request);
            } else {
                $authGuard->logout();
                header('HTTP/1.1 401 Authorization Required');
                header('WWW-Authenticate: Basic realm="Access denied"');
                exit();
            }
        } else {
            return $next($request);
        }
    }
}
