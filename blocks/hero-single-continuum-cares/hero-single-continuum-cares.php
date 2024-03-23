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

$title       = get_field('title');
$text        = get_field('text');
$cta         = get_field('cta');
$phone       = get_field('phone');
$location    = get_field('location');
$descriptop  = get_field('description')

?>

<section id="hero-image" class="">
    <div class="block_content lg:pt-[20px] lg:px-[75px] relative">
        <div class="bg-custom relative bg-ebony lg:min-h-[700px] pb-[0px]  lg:pb-[18px] pt-[100px] lg:pt-[18px] pl-[30px] lg:pl-[75px] pr-[30px] lg:pr-[24px] lg:rounded-[24px] flex flex-wrap lg:flex-nowrap">
            <div class="w-full lg:w-[50%] lg:pr-[80px] gap-y-[30px] flex flex-col justify-center">
                <h1><?php echo $title ?></h1>
                <div class="text-white text-[16px] lg:text-[18px] leading-[25px] lg:leading-[30px]"><?php echo $text ?></div>
                <div class="w-fit">
                    <a href="<?php echo $cta["url"] ?>" target="<?php echo $cta["target"] ?>" class="btn-blue"><?php echo $cta["title"] ?></a>
                </div>
            </div>
            <div class="w-full lg:w-[50%] mt-0 flex items-center relative h-[350px] lg:h-auto">
                <figure class="z-[99] absolute lg:w-[700px] h-[400px] lg:h-[500px] bottom-[-90px] lg:bottom-0 lg:top-[50%] lg:translate-y-[-50%]">
                    <img class=" object-cover rounded-[24px] w-full h-full" src="<?php echo get_the_post_thumbnail_url() ?>">
                </figure>
            </div>
            <div id="single-resource-paragraph" class="absolute z-[99] rounded-[39px] bg-alice-blue lg:h-[260px] p-[50px] w-[100%] right-[-6%] bottom-[-210px]">
                <div class="flex flex-row justify-between">
                    <div class="w-1/3 ">
                        <p class="" style="color:#13152E;">Get a free consultation</p>
                        <div class="flex gap-[50px] mt-[15px]">
                            <p>Mon. to Fri.</p>
                            <p>8:00 am - 6:00 pm EST</p>
                        </div>
                        <div class="mt-[15px] flex">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/call.svg">
                            <p class="ml-[15px]"><?php echo $phone ?></p>
                        </div>
                    </div>
                    <div class="w-1/3 border-x-[1px] border-[#00000036] px-[52px] ml-[52px]">
                        <p class="" style="color:#13152E;">Conveniently Located</p>
                        <p class="my-[15px]">Advaita Integrated Medicine</p>
                        <div class="mt-[15px] flex">
                            <img class="mt-[-25px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/location.svg">
                            <p class="ml-[15px]"><?php echo $location ?></p>
                        </div>
                    </div>
                    <div class="w-1/3 ml-[52px]">
                        <div><?php echo $descriptop ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-[200px]"></div>
    </div>
</section>