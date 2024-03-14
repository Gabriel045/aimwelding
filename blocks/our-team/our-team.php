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
$background = get_field("background");
$title      = get_field("title");
$paragraph  = get_field("paragraph");
$cta        = get_field("link");

$args = array(
    'post_type' => 'team',
    'posts_per_page' => 10,
    'orderby'        => 'rand',
    'post_status' => 'publish'
);

$cards = new WP_Query($args);
$cards = $cards->posts;
?>

<section class="">
    <div class="block_content <?php echo $background == "Blue" ? "bg-alice-blue rounded-[24px] py-[76px] px-[48px] mx-[76px]" : " pb-[100px]  px-[30px] lg:px-[127px]" ?>">
        <div class="flex flex-col-reverse lg:flex-row flex-wrap lg:flex-nowrap">
            <div class="w-full lg:w-[56%] flex gap-[10px] gap-y-[10px] mt-[50px] lg:mt-0 relative">
                <div class="w-[32%] flex flex-col gap-y-[20px]">
                    <?php for ($i = 0; $i <= 3; $i++) : ?>
                        <article class="rounded-[16px] py-[20px] px-[10px] lg:px-[30px] relative z-[99] <?php echo $background == "Blue" ? "bg-white" : "bg-alice-blue" ?>">
                            <figure class="flex justify-center">
                                <img class="bg-white rounded-[500px]" src="<?php echo esc_url(get_the_post_thumbnail_url($cards[$i]->ID)) ?>">
                            </figure>
                            <h6 class="font-EBGaramond text-[10px] lg:text-[14px] text-east-bay font-[700] text-center mt-[10px] lg:mt-[20px] mb-[10px]"><?php echo $cards[$i]->post_title ?></h6>
                            <p class="text-center text-[9px] lg:text-[12px] font-[700] text-east-bay "> <?php echo get_field("role", $cards[$i]->ID)  ?> </p>
                        </article>
                    <?php endfor ?>
                </div>
                <div class="w-[32%] flex flex-col gap-y-[20px] pt-[80px]">
                    <?php for ($i = 4; $i <= 6; $i++) : ?>
                        <article class="rounded-[16px] py-[20px] px-[10px] lg:px-[30px] relative z-[99] <?php echo $background == "Blue" ? "bg-white" : "bg-alice-blue" ?>">
                            <figure class="flex justify-center">
                                <img class="bg-white rounded-[500px]" src="<?php echo esc_url(get_the_post_thumbnail_url($cards[$i]->ID)) ?>">
                            </figure>
                            <h6 class="font-EBGaramond text-[10px] lg:text-[14px] text-east-bay font-[700] text-center mt-[10px] lg:mt-[20px] mb-[10px]"><?php echo $cards[$i]->post_title ?></h6>
                            <p class="text-center text-[9px] lg:text-[12px] font-[700] text-east-bay "> <?php echo get_field("role", $cards[$i]->ID)  ?> </p>
                        </article>
                    <?php endfor ?>
                </div>
                <div class="w-[32%] flex flex-col gap-y-[20px] pt-[160px]">
                    <?php for ($i = 7; $i <= 9; $i++) : ?>
                        <article class="rounded-[16px] py-[20px] px-[10px] lg:px-[30px] relative z-[99] <?php echo $background == "Blue" ? "bg-white" : "bg-alice-blue" ?>">
                            <figure class="flex justify-center">
                                <img class="bg-white rounded-[500px]" src="<?php echo esc_url(get_the_post_thumbnail_url($cards[$i]->ID)) ?>">
                            </figure>
                            <h6 class="font-EBGaramond text-[10px] lg:text-[14px] text-east-bay font-[700] text-center mt-[10px] lg:mt-[20px] mb-[10px]"><?php echo $cards[$i]->post_title ?></h6>
                            <p class="text-center text-[9px] lg:text-[12px] font-[700] text-east-bay "> <?php echo get_field("role", $cards[$i]->ID)  ?> </p>
                        </article>
                    <?php endfor ?>
                </div>
            </div>
            <div class="lg:ml-[70px] lg:mt-[160px] w-full lg:w-[44%]">
                <h2 class="no-line"><?php echo $title ?></h2>
                <div class="my-[30px] text-bombay text-[18px]  leading-[30px] relative z-[99]">
                    <?php echo $paragraph ?>
                </div>
                <div class="w-fit flex">
                    <a href="<?php echo $cta["url"] ?>" target="<?php echo $cta["target"] ?>" class="btn-dark relative z-[99]"><?php echo $cta["title"] ?></a>
                </div>
                <img id="ribbon" class="hidden lg:block absolute right-[18%] w-[300px] rotate-[76deg] mt-[-7%]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/bg-1.png">
            </div>
        </div>
    </div>
</section>
<style>
    h2.no-line {

        &::before,
        &::after {
            display: none;
        }

        text-align: start;
    }
</style>

<script>

</script>