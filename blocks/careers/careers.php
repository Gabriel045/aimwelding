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
$title               = get_field('title');
$paragraph           = get_field('text');


$args = array(
    'post_type'         => 'job',
    'posts_per_page'    => -1,
    'orderby'           => 'date',
    'order'             => 'DESC',
    'post_status'       => 'publish'
);

$job = new WP_Query($args);
$job = $job->posts;


/* Function which displays your post date in time ago format */
function meks_time_ago($date)
{
    return human_time_diff(strtotime($date), current_time('timestamp')) . ' ' . __('ago');
}
?>

<section class="relative">
    <div class="block_content relative lg:px-[75px] px-[30px] py-[100px]">
        <div class="flex flex-wrap lg:flex-nowrap gap-[64px]">
            <div class="lg:w-1/2 relative">
                <div class="sticky top-[40px]">
                    <span class="text-[18px] font-[500] text-bombay">We’re Hiring!</span>
                    <h3 class="text-start my-[20px]"><?php echo ($title) ?></h3>
                    <p class="text-[14px] lg:text-[18px] text-bombay font-500 leading-[30px]"><?php echo ($paragraph) ?></p>
                </div>
            </div>
            <div class="lg:w-1/2 flex gap-y-[32px] flex-col">
                <h3 class="text-start">Current Opportunities</h3>
                <?php foreach ($job as $key => $item) :
                    $categories = get_the_terms($item->ID, 'job-category');
                    $date = $item->post_date; ?>
                    <div class="border-t-[1px] border-[rgb(152 162 179 / 26%)] pt-[24px]">
                        <div class="flex flex-row gap-[10px]">
                            <p class="text-[18px] font-[600] text-ebony"><?php echo $item->post_title ?></p>
                            <div class="bg-alice-blue border-[1px]  border-[#a7d1f5] rounded-[16px] px-[8px] py-[2px] flex gap-[6px] text-[#175CD3] text-[14px]">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/_Dot.svg">
                                <?php echo $categories[0]->name ?>
                            </div>
                        </div>
                        <p class="text-[16px] font-[400] text-background my-[16px]"><?php echo $item->post_excerpt ?></p>
                        <div class="flex gap-[24px] flex-row">
                            <span class="flex items-center text-[16px] text-bombay font-[500]"> <img class="mr-[8px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/marker-pin-02.svg"> <?php echo get_field("location", $item->ID) ?> </span>
                            <span class="flex items-center text-[16px] text-bombay font-[500]"> <img class="mr-[8px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/clock.svg"> <?php echo meks_time_ago($date) ?> </span>
                        </div>
                        <div class="w-fit flex  mt-[30px]">
                            <a href="<?php echo get_the_permalink($item->ID) ?>" class="btn-dark" style="padding: 15px 20px;"> Apply Now! </a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>