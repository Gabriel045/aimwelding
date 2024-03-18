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
$args = array(
    'post_type'      => 'resource',
    'posts_per_page' => 3,
    'orderby'        => 'Date',
    'order'          => 'Desc',
    'post_status'    => 'publish'
);

$cards = new WP_Query($args);
$cards = $cards->posts;

?>

<section id="our-services" class="">
    <div class="block_content px-[30px] lg:px-[75px] pb-[100px]">
        <div class="flex justify-between">
            <h2 class="w-full lg:w-[60%] text-center lg:text-start">Resources</h2>
            <div class="hidden lg:block w-fit">
                <a href="/resources/" class="btn-light ">Browse all articles</a>
            </div>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap  gap-[40px] lg:gap-[25px] mt-[70px]">
            <?php foreach ($cards as $key => $card) :
                $date = $card->post_date;
                $newDate = date("F d, Y", strtotime($date));
            ?>
                <article class="w-full lg:w-[32%] flex flex-col">
                    <a href="<?php echo get_the_permalink($card->ID) ?>">
                        <figure>
                            <img class="rounded-[20px]" src="<?php echo esc_url(get_the_post_thumbnail_url($card->ID)) ?>" />
                        </figure>
                        <h5 class="text-east-bay mt-[20px] lg:mt-[30px] font-EBGaramond text-[18px] lg:text-[22px] font-[700] leading-[20px] lg:lieading-[28px]"> <?php echo esc_attr($card->post_title) ?> </h5>
                        <div class="mt-[10px] flex gap-[16px]">
                            <span class="text-[16px] lg:text-[18px] text-east-bay"><?php echo esc_attr(get_author_name($card->post_author)) ?></span>
                            <span class="flex items-center">
                                <span class="w-[28px] bg-east-bay h-[1px]"></span>
                            </span>
                            <span class="text-[16px] lg:text-[18px] text-east-bay"><?php echo esc_attr($newDate)  ?></span>
                        </div>
                    </a>
                </article>
            <?php endforeach ?>
        </div>
        <div class="flex lg:hidden mt-[50px]  justify-center">
            <a href="/resources/" class="btn-light ">Browse all articles</a>
        </div>
    </div>
</section>