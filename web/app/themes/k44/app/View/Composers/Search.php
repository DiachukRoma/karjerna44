<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Search extends Composer
{
  protected static $views = ['search'];

  public function with()
  {
    return [
      'obj' => $this,
      'back_image' => (object) get_field('general_settings', 'option')
    ];
  }

  public function getPostData($post)
  {
    $title = get_the_title($post);

    return (object) [
      'title' => $title,
      'description' => get_the_excerpt($post),
      'img' => get_the_post_thumbnail_url($post, array(400, 400)),
      'dateDay' => get_the_date('d', $post),
      'dateMoAndYear' => get_the_date('m.Y', $post),
      'link' => get_the_permalink($post),
      'twoLetters' => mb_strtoupper(mb_substr($title, 0, 2))
    ];
  }
}
