<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Stat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StatController extends Controller
{
    /**
     * Index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Stat::where('created_at', '>', now()->subWeeks(2)->startOfDay())->groupBy('sid')->count();
        return Inertia::render('Stat', ['count' => $count]);
    }
}
