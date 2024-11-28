<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;

class PageOnline extends Composer
{
  use AcfFields;

  protected static $views = ['page-online'];

  public function with()
  {
    return [
      'main' => (object) $this->fields(),
      'side_menu' => (object) get_field('side_menu', 'option'),
      'back_image' => (object) get_field('general_settings', 'option')
    ];
  }
}
