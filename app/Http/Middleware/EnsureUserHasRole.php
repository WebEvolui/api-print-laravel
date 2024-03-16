<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $roles = [
            'admin' => Role::Admin,
            'store' => Role::Store,
            'customer' => Role::Customer,
        ];

        if (Role::from($request->user()->role_id) != $roles[$role]) {
            throw new HttpException(403, 'User does not have the right roles.');
        }

        return $next($request);
    }
}
