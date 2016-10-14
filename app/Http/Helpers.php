<?php

namespace App\Http;

use Illuminate\Support\Facades\Cache;

/**
 * Records number of requests of a page.
 *
 * @param $page_id
 */
Class Helpers
{
    function recordPageViews($page_id)
    {
        $memcache = new Cache();
        $key = $page_id;

        if (!$memcache::get($key)) {
            $memcache::put($key, 0, 10);
        }
        $new_count = $memcache::increment($key);

        if ($new_count >= 5) {

            $sql = "UPDATE topics SET views = views + $new_count WHERE id = $page_id";
            \DB::update(\DB::raw($sql));
            $memcache::pull($key);
        }
    }
}