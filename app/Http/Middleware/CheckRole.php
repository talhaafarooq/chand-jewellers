<?php

namespace App\Http\Middleware;

use App\Enums\UserTypeEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->role == UserTypeEnum::AdminUser->value)
        {
            return $next($request);
        }
        // Redirect or perform other actions if the user doesn't have the required role
        abort(403, 'User does not have the right permissions.');
    }
}
