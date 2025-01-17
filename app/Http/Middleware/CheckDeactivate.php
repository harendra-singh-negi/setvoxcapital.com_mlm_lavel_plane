<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckDeactivate
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && (auth()->user()->status == 0)) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors(['msg' => 'Your Account is Deactivated, please contact: ' . setting('support_email', 'global')]);
        }

        return $next($request);
    }
}
