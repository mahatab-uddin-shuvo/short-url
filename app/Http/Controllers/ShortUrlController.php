<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Shortner;
use Illuminate\Support\Str;
use Config;
use Inertia\Inertia;
use App\Repositories\Interfaces\ShortUrlInterface;


class ShortUrlController extends Controller
{

    protected $shortUrl;

    public function __construct(ShortUrlInterface $shortUrl)
    {
        $this->shortUrl = $shortUrl;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->shortUrl->create();
        return Inertia::render('Create');

    }

    public function store(Request $request)
    {
        $shortner = $this->shortUrl->store($request);
        // Return the short URL.
        return response()->json([
            'shortUrl' => $shortner->short_url,
        ]);
    }

    public function redirect($shortUrl)
    {
        $value = $this->shortUrl->redirect($shortUrl);

        // Redirect to the original URL.
        return redirect()->to($value->main_url);
    }
}
