<?php

namespace App\View\Composers\Traits;

trait PostMaper {
  public static function mapPosts($posts) {
    return collect($posts)->map(function ($post) {
      $post_date = get_post_field('post_date', $post);
      $is_future = strtotime($post_date) > current_time('timestamp');

      return (object) [
        'title' => get_the_title($post),
        'description' => get_the_excerpt($post),
        'img' => get_the_post_thumbnail_url($post, [400, 400]),
        'dateDay' => get_the_date('d', $post),
        'dateMoAndYear' => get_the_date('m.Y', $post),
        'link' => get_the_permalink($post),
        'isFuture' => $is_future,
      ];
    });
  }
}

