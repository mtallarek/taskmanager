<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;

class AuthTaskAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $task = $request->route('task');
        $user = $request->route('user');

        if($task) {
           Gate::authorize('view', $task);
        }
        if($user) {
            if($user->id != auth()->user()->id) {
                abort(Response::HTTP_FORBIDDEN, 'This action is unauthorized.');
            }
        }

        return $next($request);
    }
}
