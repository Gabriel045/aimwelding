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
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[75px]">
        <div class=" bg-east-bay rounded-[24px] h-auto lg:h-[1030px] flex flex-col justify-center items-center px-[40px] py-[75px] relative">
            <img class="absolute top-[48%] lg:top-[50%] lg:translate-y-[-50%] left-[-31%] lg:left-0 rotate-[-95deg] lg:rotate-0 w-[300px] lg:w-auto" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_white.png">
            <h3 class="text-[24px] lg:text-[74px] leading-[40px] lg:leading-[88px] text-white font-EBGaramond font-[700] lg:w-[60%] text-center relative z-10"> Lorem Ipsum Dolor Cton</h3>
            <img class="mt-[40px] z-10" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/image 2.png">
            <img class="absolute top-[-18%] lg:top-[35%] rotate-[-13deg] lg:rotate-[-70deg] right-[-36%] lg:right-0" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_white.png">
            <div class="flex justify-center flex-wrap lg:flex-nowrap gap-[20px] mt-[50px]">
                <div class="w-fit flex">
                    <a href="<?php echo $cta["url"] ?>" target="<?php echo $cta["target"] ?>" class="btn-dark relative z-[99]">Book an appointment</a>
                </div>
                <div class="w-fit flex">
                    <a href="/resources/" class="btn-white">Our services</a>
                </div>
            </div>
        </div>
    </div>
</section>