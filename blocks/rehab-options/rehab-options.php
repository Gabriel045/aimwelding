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
$title   =  get_field('title');
$text    =  get_field('text');
$cards   =  get_field('cards');

?>

<section class="bg-alice-blue">
    <div class="block_content  px-[30px] lg:px-[75px] py-[100px] lg:flex lg:flex-col lg:items-center">
        <h3><?php echo $title ?></h3>
        <p class="text-[18px] leading-[30px] text-bombay text-center mt-[30px] lg:w-[80%]"><?php echo $text ?></p>
        <div class="hidden lg:flex mt-[50px] flex-wrap gap-[28px] gap-y-[28px]">
            <?php foreach ($cards as $key => $card) : ?>
                <article class="w-[31.8%] h-[412px] rounded-[24px] px-[30px]  py-[53px] flex flex-col justify-end" style="background-position:center; background-size:cover; background-image:url(<?php echo $card["background"] ?>)">
                    <h5 class="text-white font-EBGaramond text-[28px] font-[700]"><?php echo $card["title"] ?></h5>
                    <p class="mt-[18px] text-white text-[18px] leading-[30px]"><?php echo $card["text"] ?></p>
                </article>
            <?php endforeach ?>
        </div>
        <div class="block lg:hidden">
            <div id="multiple-rehab" class="h-[400px] lg:hidden mt-[50px]">
                <?php foreach ($cards as $key => $card) : ?>
                    <div class="slider-item">
                        <article class=" h-[412px] rounded-[24px] px-[30px]  py-[53px] flex flex-col justify-end" style="background-position:center; background-size:cover; background-image:url(<?php echo $card["background"] ?>)">
                            <h5 class="text-white font-EBGaramond text-[28px] font-[700]"><?php echo $card["title"] ?></h5>
                            <p class="mt-[10px] text-white test-[18px] leading-[30px]"><?php echo $card["text"] ?></p>
                        </article>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="flex justify-center mt-[50px]">
                <div class="w-fit">
                    <a href="/service/" class="btn-light ">all services</a>
                </div>
            </div>
        </div>

    </div>
</section>



<script>
    jQuery(document).ready(() => {
        jQuery('#multiple-rehab').slick({
            infinite: true,
            autoplay: false,
            autoplaySpeed: 4000,
            slidesToShow: 1,
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