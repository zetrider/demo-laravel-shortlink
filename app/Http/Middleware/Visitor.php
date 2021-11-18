<?php

namespace App\Http\Middleware;

use App\Services\Visitor\VisitorIdService;
use Closure;

class Visitor
{
    /** @var VisitorIdService */
    private VisitorIdService $service;

    /**
     * @param VisitorIdService $service
     */
    public function __construct(VisitorIdService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $this->service->id();

        $request->attributes->add(['visitor_id' => $id]);

        return $next($request);
    }
}
