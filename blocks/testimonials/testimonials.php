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
$cards = get_field("cards");
$cta   = get_field("cta");
?>

<section class="pt-[100px] mt-[-100px]">
    <div class="block_content px-[30px] lg:px-[75px] pb-[100px] relative">
        <img id="ribbon" class="hidden lg:block absolute left-[-4%] top-[-16%] w-[300px] rotate-[-23deg]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/bg-1.png">
        <div class="title flex flex-row">
            <div class="hidden lg:flex w-[50%] h-auto  items-center">
                <div class="w-full h-[1px] bg-[#4057892e]"></div>
            </div>
            <h2 class="w-full lg:w-[45%]"><?php echo $title ?></h2>
            <div class="hidden lg:flex w-[50%] h-auto items-center">
                <div class="w-full h-[1px] bg-[#4057892e]"></div>
            </div>
        </div>
        <div id="multiple-testimonials" class=" mt-[50px] z-[99]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="slider-item">
                    <div class="h-[350px] lg:h-[380px] rounded-[24px] py-[64px] px-[25px] flex  flex-col  gap-y-[24px] bg-alice-blue">
                        <figure>
                            <img src="<?php echo $card["icon"] ?>" alt="" srcset="">
                        </figure>
                        <h5 class="text-east-bay font-EBGaramond text-[28px] font-[700] w-[80%]"><?php echo $card["title"] ?> </h5>
                        <p class="text-[18] text-bombay"><?php echo $card["text"] ?></p>
                    </div>
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
        jQuery('#multiple-testimonials').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            useTransform: false,
            arrows: true,
            prevArrow: "<span class='a-left  control-c prev slick-prev relative z-[9999]'></span>",
            nextArrow: "<span class='a-right  control-c next slick-next relative z-[9999]'></span>",
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