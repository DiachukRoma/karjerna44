<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;

class PageServices extends Composer
{
  use AcfFields;

  protected static $views = ['page-services'];
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
      'services' => collect($this->fields['services']),
      'back_image' => (object) get_field('general_settings', 'option')
    ];
  }
}
