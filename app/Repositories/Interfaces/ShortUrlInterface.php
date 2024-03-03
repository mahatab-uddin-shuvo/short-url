<?php

namespace App\Repositories\Interfaces;

interface ShortUrlInterface
{
    public function store($request);

    public function redirect($shortUrl);

}
