<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;

class PageDoctrine extends Composer
{
    use AcfFields;

    protected static $views = ['page-doctrine'];
    private $fields;

    public function __construct()
    {
        $this->fields = $this->fields();
    }

    public function with()
    {
        return [
            'title' => $this->fields['title'],
            'subtitle' => $this->fields['subtitle'],
            'doctrine' => collect($this->fields['doctrine']),
            'back_image' => (object) get_field('general_settings', 'option')
        ];
    }
}
