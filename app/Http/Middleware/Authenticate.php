<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

use function route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @return string | null
     */
    protected function redirectTo(Request $request): string | null
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

        return null;
    }
}
