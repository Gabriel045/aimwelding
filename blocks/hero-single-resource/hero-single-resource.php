<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */


if (isset($block['data']['preview_image_my_acf_block'])) {

    echo '<img src="' . get_template_directory_uri() . $block['data']['preview_image_my_acf_block'] . ' " style="width: 100%; height: auto;">';

    return;
}


// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'hero-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.

$title              = get_field('title');
$text               = get_field('text');
$paragraph          = get_field('paragraph');

?>

<section class="">
    <div class="block_content px-0 lg:px-[75px] lg:pt-[20px] ">
        <div class="bg-ebony h-[850px] lg:h-auto lg:rounded-[24px] py-[112px] px-[30px] lg:px-[84px] relative">
            <img class="absolute right-[-150px] lg:right-[-76px] bottom-[-150px] lg:bottom-[-58px] rotate-[80deg]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_white.png" />
            <div class="w-full lg:w-[60%]">
                <h1><?php echo $title ?></h1>
                <p class="text-white text-[18px] leading-[30px] mt-[20px]"><?php echo $text ?></p>
            </div>

            <div id="single-resource-paragraph" class="absolute rounded-[39px] bg-alice-blue p-[60px] w-[90%] left-[50%] translate-x-[-50%] bottom-[-240px]">
                <?php echo  $paragraph ?>
            </div>

        </div>
        <div class="h-[300px]"></div>
    </div>
</section>