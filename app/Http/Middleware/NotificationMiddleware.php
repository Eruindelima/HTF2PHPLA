<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class NotificationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $builder = Order::query()
            ->where('pendant', true)
            ->where('owner_id', auth()->user()->id);

        view()->share('countNotifications', $builder->count());
        view()->share('resumeNotifications', $builder->orderByDesc('created_at')->take(3)->get());

        return $next($request);
    }
}
