<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     */
    protected static $views = ['*'];

    /**
     * Data to be passed to view before rendering.
     */
    public function with()
    {
        return [
            'home_link' => get_home_url(),
            'side_menu' => $this->sideMenu(),
        ];
    }

    public function sideMenu()
    {
        return (object) get_field('side_menu', 'option');
    }
}
