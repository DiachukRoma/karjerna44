<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageContacts extends Composer
{
    protected static $views = ['page-contacts'];

    public function with()
    {
        return ['back_image' => (object) get_field('general_settings', 'option')];
    }
}
