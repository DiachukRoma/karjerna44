<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;

class FrontPage extends Composer
{
    use AcfFields;
    use Traits\PostMaper;

    protected static $views = ['front-page'];
    private $fields;

    public function __construct()
    {
        $this->fields = $this->fields();
    }

    public function with()
    {
        return [
            'main' => $this->fields['main_section'],
            'last_events' => $this->lastEvents(),
            'worship' => $this->worship(),
            'events' => $this->events(),
            'ministers' => $this->ministers(),
            'contacts' => $this->fields['contacts']
        ];
    }

    public function lastEvents()
    {
        $posts = get_posts([
            'post_type' => 'events',
            'numberposts' => 10,
        ]);

        return $this->mapPosts($posts);
    }

    public function worship()
    {
        $data = get_field('worship');
        $data['posts'] = $this->mapPosts(get_posts([
            'post_type' => 'post',
            'numberposts' => 12,
            'post_status'    => ['publish', 'future']
        ]));
        $data['linkAll'] = (object) ['title' => 'Переглянути всi', 'url' => home_url('/worship')];

        return (object) $data;
    }

    public function events()
    {
        $data = get_field('events');
        $data['posts'] = $this->mapPosts(get_posts([
            'post_type' => 'events',
            'numberposts' => 12,
            'post_status'    => ['publish', 'future']
        ]));
        $data['linkAll'] = (object) ['title' => 'Переглянути всi', 'url' => home_url('/events')];

        return (object) $data;
    }

    public function ministers()
    {
        $data = get_field('servants');
        $data['posts'] = collect(get_posts([
            'post_type' => 'ministers',
            'numberposts' => 12,
        ]))->map(function ($post) {
            return (object) [
                'title' => get_the_title($post),
                'description' => get_the_excerpt($post),
                'img' => get_the_post_thumbnail_url($post, array(400, 400)),
                'dateDay' => get_the_date('d', $post),
                'dateMoAndYear' => get_the_date('m.Y', $post),
                'link' => get_the_permalink($post),
                'tag' => wp_get_post_tags($post->ID)[0]->name
            ];
        });
        $data['linkAll'] = (object) ['title' => 'Переглянути всix', 'url' => home_url('/ministers')];

        return (object) $data;
    }
}
