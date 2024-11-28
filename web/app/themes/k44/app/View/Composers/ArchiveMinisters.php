<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ArchiveMinisters extends Composer
{
    use Traits\PostMaper;

    protected static $views = ['archive-ministers'];

    public function with()
    {
        return [
            'ministers' => $this->ministers(),
            'back_image' => $this->backImage()
        ];
    }

    public function ministers()
    {
        return collect(get_posts([
            'post_type' => 'ministers',
            'numberposts' => -1,
        ]))->map(function ($post) {
            return (object) [
                'title' => get_the_title($post),
                'img' => get_the_post_thumbnail_url($post, array(400, 400)),
                'tag' => wp_get_post_tags($post->ID)[0]->name
            ];
        });
    }
    public function backImage()
    {
        return (object) get_field('general_settings', 'option');
    }
}
