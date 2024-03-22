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
$title = get_field("title");
$excerpt = get_field("excerpt");
$cta   = get_field("cta");

$args = array(
    'post_type'      => 'what-we-treat',
    'posts_per_page' =>  6,
    'post__not_in'   => array($post->ID),
    'orderby'        => 'Date',
    'order'          => 'Desc',
    'post_status'    => 'publish'
);

$cards = new WP_Query($args);
$cards = $cards->posts;


?>

<section class="">
    <div class="block_content px-[30px] lg:px-[75px] pb-[100px] pt-[50px] lg:pt-[100px]">
        <div class="title flex flex-row">
            <div class="hidden lg:flex w-[50%] h-auto  items-center">
                <div class="w-full h-[1px] bg-[#4057892e]"></div>
            </div>
            <h2 class="w-full lg:w-[45%]"><?php echo $title ?></h2>
            <div class="hidden lg:flex w-[50%] h-auto items-center">
                <div class="w-full h-[1px] bg-[#4057892e]"></div>
            </div>
        </div>
        <div id="multiple-items" class="mt-[50px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="slider-item hover-arrow">
                    <a href="<?php echo get_the_permalink($card->ID) ?>" class="<?php echo $excerpt  ? 'h-[400px]' : 'h-[262px]' ?> rounded-[24px] p-[35px] flex  flex-col justify-end gap-y-[24px]" style="background-size:cover; background-repeat:no-repeat; background-image:linear-gradient(rgb(0 0 0 / 34%) 100%, rgba(0, 0, 0, 0.5) 100%), url(<?php echo esc_url(get_the_post_thumbnail_url($card->ID)) ?>)">
                        <h5 class="text-white font-EBGaramond text-[28px] font-[700]"><?php echo $card->post_title ?> </h5>
                        <?php if ($excerpt) : ?>
                            <p style="color:white"><?php echo $card->post_excerpt ?></p>
                        <?php endif ?>
                        <div class="text-white text-[18px] font-[700] flex ">
                            Learn more
                            <img class="arrow ml-[10px] mr-[5px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Arrow Right.svg">
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
        <div class="flex justify-center mt-[50px]">
            <div class="w-fit">
                <a href="<?php echo $cta["url"] ?>" target="<?php echo $cta["target"] ?>" class="btn-light "><?php echo $cta["title"] ?></a>
            </div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(() => {
        jQuery('#multiple-items').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            useTransform: false,
            arrows: true,
            prevArrow: "<span class='a-left  control-c prev slick-prev relative'></span>",
            nextArrow: "<span class='a-right  control-c next slick-next relative'></span>",
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }]
        });
    })
</script>