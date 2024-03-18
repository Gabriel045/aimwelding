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

$upper_text         = get_field('upper_text');
$title              = get_field('title');
$text               = get_field('text');
$cta                = get_field('cta');
$big_image          = get_field('big_image');
$small_image_1      = get_field('small_image_1');
$small_image_2      = get_field('small_image_2');


?>

<section id="hero-image" class="">
    <div class="block_content relative lg:px-[75px] lg:pt-[20px]">
        <img class="hidden lg:block absolute right-[-10%] bottom-[10px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector.svg" />
        <div class="bg-ebony pb-[150px]  lg:pb-[18px] pt-[50px] lg:pt-[18px] pl-[30px] lg:pl-[75px] pr-[30px] lg:pr-[24px] lg:rounded-[24px] flex flex-wrap lg:flex-nowrap">
            <div class="w-full lg:w-[50%] lg:pr-[80px] gap-y-[30px]  flex flex-col justify-center">
                <p class="text-anakiwa text-[16px] lg:text-[18px]"><?php echo $upper_text ?></p>
                <h1><?php echo $title ?></h1>
                <p class="text-[#D8E5E9] text-[16px] lg:text-[18px] leading-[25px] lg:leading-[30px]"><?php echo $text ?></p>
                <div class="w-fit">
                    <a href="<?php echo $cta["url"] ?>" target="<?php echo $cta["target"] ?>" class="btn-blue"><?php echo $cta["title"] ?></a>
                </div>
            </div>
            <div class="w-full lg:w-[50%] mt-[50px] lg:mt-0">
                <figure class="relative z-[99]">
                    <img class="rounded-[24px]" src="<?php echo $big_image ?>">
                </figure>
                <div class="flex gap-[10px] mt-[20px] relative">
                    <figure class="absolute lg:relative z-[99] w-[50%] lg:w-auto left-0">
                        <img class="rounded-[24px] object-cover h-[220px] lg:h-auto" src="<?php echo $small_image_1 ?>" alt="" srcset="">
                    </figure>
                    <figure class="absolute lg:relative z-[99] w-[50%] lg:w-auto right-0 pl-[15px] lg:pl-0">
                        <img class="rounded-[24px] object-cover h-[220px] lg:h-auto" src="<?php echo $small_image_2 ?>" alt="" srcset="">
                    </figure>

                </div>
            </div>
        </div>
        <div class="lg:hidden block h-[100px]"></div>
    </div>
</section>