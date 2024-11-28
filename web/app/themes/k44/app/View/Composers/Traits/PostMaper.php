<?php

namespace App\View\Composers\Traits;

trait PostMaper {
  public static function mapPosts($posts) {
    return collect($posts)->map(function ($post) {
      return (object) [
        'title' => get_the_title($post),
        'description' => get_the_excerpt($post),
        'img' => get_the_post_thumbnail_url($post, array(400, 400)),
        'dateDay' => get_the_date('d', $post),
        'dateMoAndYear' => get_the_date('m.Y', $post),
        'link' => get_the_permalink($post),
      ];
    });
  }
}
