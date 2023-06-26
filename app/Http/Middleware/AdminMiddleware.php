<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((integer)auth()->user()->role !== User::ROLE_ADMIN){
           // abort(404);
            return redirect()->route('home'); // якщо користувач не має доступу адміна, то переводити на головну сторінку блога
        };
        return $next($request);         //якщо користувач адмін, то проводити далі по міддлвейру
    }
}
