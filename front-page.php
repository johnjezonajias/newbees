<?php

$context = Timber::context();
$args = [
    'post_type' => 'post',
    'paged'     => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
];

$context['posts'] = Timber::get_posts( $args );
$context['title'] = $context['post']->title;

Timber::render( 'front-page.twig', $context );
