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


?>

<section id="our-services" class="">
    <div class="block_content px-[30px] lg:px-[75px] py-[100px] relative">
        <div class="title flex flex-row">
            <div class="hidden lg:flex w-[50%] h-auto  items-center">
                <div class="w-full h-[1px] bg-[#4057892e]"></div>
            </div>
            <h2 class="w-full lg:w-[45%]"><?php echo $title ?></h2>
            <div class="hidden lg:flex w-[50%] h-auto items-center">
                <div class="w-full h-[1px] bg-[#4057892e]"></div>
            </div>
        </div>
        <div class="flex mt-[100px] flex-row flex-wrap gap-[40px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="w-full lg:w-[31%]">
                    <div class="h-[380px] rounded-[24px] py-[64px] px-[25px] flex  flex-col  gap-y-[24px] bg-alice-blue">
                        <figure>
                            <img src="<?php echo $card["icon"] ?>" alt="" srcset="">
                        </figure>
                        <h5 class="text-east-bay font-EBGaramond text-[28px] font-[700]"><?php echo $card["title"] ?> </h5>
                        <p class="text-[18] text-bombay"><?php echo $card["text"] ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
</section>