<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageSongs extends Composer
{
    protected static $views = ['page-songs'];

    public function with()
    {
        return [
            'songs' => $this->songs(),
            'back_image' => (object) get_field('general_settings', 'option')
        ];
    }

    public function songs()
    {
        $getParam = !empty($_GET['song']) ? 'WHERE id=' . $_GET['song'] : 'ORDER BY name COLLATE utf8_unicode_ci';

        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}songs " . $getParam, OBJECT);

        return $results;
    }
}
