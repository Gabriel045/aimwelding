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
    'post_type'      => 'service',
    'posts_per_page' => -1,
    'orderby'        => 'Name',
    'order'          => 'Asc',
    'post_status'    => 'publish'
);

$cards = new WP_Query($args);
$cards = $cards->posts;
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[75px] py-[80px]">
        <?php foreach ($cards as $key => $card) :
            $icon = get_field("icon", $card->ID);
            $archive_excerpt = get_field("archive_excerpt", $card->ID);
            $position = $key % 2;
        ?>
            <div class="flex  flex-wrap lg:flex-nowrap  mb-[100px] last:mb-0 <?php echo $position ? 'flex-col-reverse lg:flex-row-reverse' : 'flex-col-reverse lg:flex-row' ?>">
                <div class="w-full lg:w-1/2">
                    <figure class="mt-[70px] lg:mt-0">
                        <img class="rounded-[24px] lg:h-[736px]" src="<?php echo esc_url(get_the_post_thumbnail_url($card->ID)) ?>">
                    </figure>
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-center <?php echo $position ? 'lg:pr-[70px]' : 'lg:pl-[70px]' ?>">
                    <img class="w-[30px]" src="<?php echo esc_url($icon) ?>">
                    <h3 class="mt-[30px] text-east-bay text-[24px] lg:text-[36px] font-[700] font-EBGaramond text-start"> <?php echo $card->post_title ?></h3>
                    <div class="my-[30px] text-bombay leading-[30px] lg:text-[18px]"><?php echo $archive_excerpt ?></div>
                    <div class="w-fit flex">
                        <a href="<?php echo esc_url(get_the_permalink($card->ID)) ?>" class="btn-dark relative z-[99]">Learn more</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>