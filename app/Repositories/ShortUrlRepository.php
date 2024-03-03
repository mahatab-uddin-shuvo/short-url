<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ShortUrlInterface;
use DB;
use App\Models\Shortner;
use Illuminate\Support\Str;
use Config;
use Inertia\Inertia;

class ShortUrlRepository implements ShortUrlInterface
{

    public function store($request)
    {
        $url = $request->input('url');

        $val = Str::random(6);
        $shortner = new Shortner();
        $shortner->main_url = $url;
        $shortner->url_key = $val;
        $shortner->short_url=Config::get('app.url')."/"."srt"."/".$val;
        $shortner->save();

        return $shortner;
    }
    public function redirect($shortUrl)
    {
        // Find the short URL.
        $shortUrl = Shortner::where('url_key', $shortUrl)->first();
        return $shortUrl;
    }

}
