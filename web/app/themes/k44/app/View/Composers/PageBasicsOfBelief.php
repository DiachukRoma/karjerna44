<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageBasicsOfBelief extends Composer
{
    protected static $views = ['page-basics-of-belief'];

    public function with()
    {
        return ['back_image' => (object) get_field('general_settings', 'option')];
    }
}
