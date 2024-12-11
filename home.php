<?php

$context = Timber::context();
$args = [
    'post_type' => 'post',
    'paged'     => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
];

$context['posts'] = Timber::get_posts( $args );
$context['title'] = get_the_title( get_option( 'page_for_posts' ) );

Timber::render( 'home.twig', $context );
