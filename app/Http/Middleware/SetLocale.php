<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->has('language')) {
            $request->validate(['language' => 'exists:language,id']);
            App::setLocale($request->get('language'));
        }

        return $next($request);
    }
}
