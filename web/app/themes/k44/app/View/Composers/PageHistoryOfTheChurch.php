<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;

class PageHistoryOfTheChurch extends Composer
{
  use AcfFields;

  protected static $views = ['page-history-of-the-church'];
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
      'content' => collect($this->fields['flexible_content']),
      'back_image' => $this->backImage()
    ];
  }

  public function backImage()
  {
    return (object) get_field('general_settings', 'option');
  }
}
