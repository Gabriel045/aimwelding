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
$text = get_field("text");
$cards = get_field("cards");
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[75px] pt-[100px]">
        <div class="flex flex-col items-center">
            <h2 class="text-center text-ebony"><?php echo $title ?></h2>
            <p class="w-[40%] text-center text-east-bay mt-[20px]"><?php echo $text ?></p>
        </div>
        <div class="mt-[50px] flex flex-wrap lg:flex-nowrap gap-[20px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="w-full lg:w-1/2">
                    <figure>
                        <img class="rounded-[24px] w-full h-[500px] object-cover" src="<?php echo $card["image"] ?>">
                    </figure>
                    <h3 class="mt-[30px] text-start text-ebony"><?php echo $card["location"] ?></h3>
                    <p class="mt-[30px] text-east-bay lg:w-[80%]"><?php echo $card["text"] ?></p>
                    <div class="mt-[30px] flex flex-nowrap flex-row justify-between">
                        <div class="w-[50%] flex flex-col gap-y-[5px] text-bombay">
                            <span class="font-[16px]">
                                Email address
                            </span>
                            <span class="font-EBGaramond text-ebony text-[22px] font-[700]">
                                <?php echo $card["mail"] ?>
                            </span>
                        </div>
                        <div class="w-[50%] flex flex-col gap-y-[5px] text-bombay">
                            <span class="font-[16px]">
                                Phone number
                            </span>
                            <span class="font-EBGaramond text-ebony text-[22px] font-[700]">
                                <?php echo $card["phone"] ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>