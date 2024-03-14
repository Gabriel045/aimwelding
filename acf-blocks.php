<?php

//ACF Blocks
add_action('init', 'register_acf_blocks');

function register_acf_blocks()
{
    register_block_type(__DIR__ . '/blocks/hero-home');
    register_block_type(__DIR__ . '/blocks/hero');   
    register_block_type(__DIR__ . '/blocks/what-we-treat');
    register_block_type(__DIR__ . '/blocks/our-services');   
    register_block_type(__DIR__ . '/blocks/our-team');   
    register_block_type(__DIR__ . '/blocks/testimonials');   
    register_block_type(__DIR__ . '/blocks/blog');   
    register_block_type(__DIR__ . '/blocks/contact');   
    register_block_type(__DIR__ . '/blocks/services-archive');   
    register_block_type(__DIR__ . '/blocks/faq');   
    register_block_type(__DIR__ . '/blocks/text-image');   
    register_block_type(__DIR__ . '/blocks/rehab-options');   
    register_block_type(__DIR__ . '/blocks/careers');   
    register_block_type(__DIR__ . '/blocks/our-values');   
    register_block_type(__DIR__ . '/blocks/blog-content');   
}