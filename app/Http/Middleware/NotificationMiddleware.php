<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class NotificationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $orderedBuilder = Order::query()
            ->where('pendant', true)
            ->where('owner_id', auth()->user()->id);

        $aprovedBuilder = Order::query()
            ->where('pendant', false)
            ->where('client_id', auth()->user()->id);

        $countNotifications = $orderedBuilder->count() + $aprovedBuilder->count();

        view()->share('countNotifications', $countNotifications);
        view()->share('orderedBuilder', $orderedBuilder->orderByDesc('created_at')->take(3)->get());
        view()->share('aprovedBuilder', $aprovedBuilder->orderByDesc('created_at')->take(3)->get());

        return $next($request);
    }
}
