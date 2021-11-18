<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Actions\Visit\VisitActionInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VisitController extends Controller
{
    /**
     * Store
     *
     * @param  VisitActionInterface  $action
     * @param  Link  $link
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function store(VisitActionInterface $action, Link $link)
    {
        $stat = $action->visit($link);

        if ($link->commercial) {
            return Inertia::render('Visit', [
                'image' => $stat->imageUrl,
                'url' => $link->url,
            ]);
        } else {
            return redirect($link->url);
        }
    }
}
