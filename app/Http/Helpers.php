<?php

namespace App\Http;

/**
 * Records number of requests of a page.
 *
 * @param $page_id
 */
Class Helpers
{
    function recordPageViews($page_id)
    {
        if (isset($page_id['topic_id'])) {
            $topic_id = $page_id['topic_id'];
            $sql = "UPDATE topics SET views = views + 1 WHERE id = $topic_id";
            \DB::update(\DB::raw($sql));
        } elseif (isset($page_id['id'])) {
            $user_id = $page_id['id'];
            $sql = "UPDATE profiles SET profile_views = profile_views + 1 WHERE id = $user_id";
            \DB::update(\DB::raw($sql));
        }
    }

    function delDuplicateIP()
    {
        $sql = "DELETE FROM sessions WHERE last_activity NOT IN (SELECT MAX(last_activity) _ 
                FROM (SELECT * FROM sessions) AS duplicates GROUP BY ip_address)";
        \DB::update(\DB::raw($sql));
    }
}