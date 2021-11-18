<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\LinkRequest;
use App\Http\Resources\LinkResource;
use App\Http\Resources\StatResource;
use App\Services\Slug\SlugServiceInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LinkController extends Controller
{
    /**
     * Create
     *
     * @param SlugServiceInterface $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(SlugServiceInterface $service)
    {
        $slug = $service->slug(function ($slug) {
            return Link::query()->where('slug', $slug)->count() == 0;
        });

        return Inertia::render('Create', [
            'slug' => $slug,
            'url' => config('app.url')
        ]);
    }

    /**
     * Store
     *
     * @param  LinkRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LinkRequest $request)
    {
        $link = Link::create($request->validated());

        return redirect()->route('links.show', $link);
    }

    /**
     * Show
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        $link->load([
            'stats' => function ($query) {
                $query->latest();
            }
        ]);

        return Inertia::render('Show', [
            'link' => new LinkResource($link),
            'stats' => StatResource::collection($link->stats),
        ]);
    }
}
