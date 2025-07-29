<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use function Roots\bundle;

class Index extends Composer
{
    use Traits\PostMaper;

    protected static $views = ['index', 'category'];

    public function __construct()
    {
        $dates = collect(get_posts([
            'numberposts' => -1,
        ]))->map(function ($post) {
            return get_the_date('Y-m-d', $post);
        });

        bundle('app')->enqueue()->localize('post_dates_params', array('dates' => $dates));
    }

    public function with()
    {
        return [
            'posts' => $this->posts(),
            'back_image' => $this->backImage()
        ];
    }

    public function posts()
    {
        $posts = get_posts(['numberposts' => 6]);

        return $this->mapPosts($posts);
    }

    public function backImage()
    {
        return (object)get_field('general_settings', 'option');
    }
}
