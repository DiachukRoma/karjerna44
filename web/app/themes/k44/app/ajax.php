<?php

/**
 * Load More Posts Handler
 */
function load_more_posts_handler()
{
  $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = 6;

  $args = [
    'post_type' => $_POST['post_type'],
    'posts_per_page' => $posts_per_page,
    'offset' => ($page - 1) * $posts_per_page,
  ];

  if (!empty($_POST['date'])) {
    list($year, $monthnum, $day) = array_map('intval', explode('-', $_POST['date']));

    $args['year'] = $year;
    $args['monthnum'] = $monthnum;
    $args['day'] = $day;
  }

  if (!empty($_POST['text'])) {
    $args['s'] = $_POST['text'];
  }

  $collect = new WP_Query($args);

  $posts = collect($collect->posts)->map(function ($post) {
    return (object) [
      'title' => get_the_title($post),
      'description' => get_the_excerpt($post),
      'img' => get_the_post_thumbnail_url($post, array(400, 400)),
      'dateDay' => get_the_date('d', $post),
      'dateMoAndYear' => get_the_date('m.Y', $post),
      'link' => get_the_permalink($post),
    ];
  });

  $next_page = $collect->max_num_pages <= $page ? false : true;

  wp_send_json_success(['posts' => $posts->toArray(), 'next_page' => $next_page]);
}

add_action('wp_ajax_load_more_posts', 'load_more_posts_handler');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_handler');
