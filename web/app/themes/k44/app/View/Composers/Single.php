<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Single extends Composer
{
    use Traits\PostMaper;

    protected static $views = ['single'];

    public function with()
    {
        return [
            'content' => collect(get_field('flexible_content')),
            'back_image' => (object) get_field('general_settings', 'option'),
            'related' => $this->related()
        ];
    }

    public function related()
    {
        $data = get_field('similar_posts');
        $posts = [];

        if (isset($data['posts'])) {
            $posts['posts'] = $this->mapPosts($data['posts']);
            $posts['isShow'] = $data['isShow'];
            $posts['linkAll'] = (object) ['title' => 'Переглянути всi', 'url' => home_url('/worship')];
            return (object) $posts;
        }
        return (object) ['isShow' => false];
    }
}
