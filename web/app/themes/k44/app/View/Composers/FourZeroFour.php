<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class FourZeroFour extends Composer
{
    protected static $views = ['404'];

    public function with()
    {
        return [
            'back_image' => $this->backImage()
        ];
    }

    public function backImage()
    {
        return (object) get_field('general_settings', 'option');
    }
}
