<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;

class TemplateStandartPage extends Composer
{
    use AcfFields;

    protected static $views = ['template-standart-page'];

    public function with()
    {
        return [
            'main' => (object) $this->fields(),
            'back_image' => (object) get_field('general_settings', 'option'),
            'content' => collect(get_field('flexible_content')),
        ];
    }
}
