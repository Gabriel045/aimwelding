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
$background = get_field('background');
$cards   =  get_field('card');

?>

<section class="">
    <div class="block_content px-[30px] lg:px-[75px] py-[80px] <?php echo $background == "Blue" ? 'bg-alice-blue rounded-[24px]  lg:mx-[75px]' : '' ?>">
        <?php foreach ($cards as $key => $card) :
            $image_position =  $card['image_position'];
            $image          =  $card['image'];
            $title          =  $card['title'];
            $text           =  $card['text'];
        ?>
            <div class="flex mb-[100px] last:mb-0 <?php echo $image_position == "Right" ? 'flex-row-reverse' : '' ?>">
                <div class="w-1/2 flex">
                    <figure class="w-full">
                        <img class="w-full rounded-[24px] object-cover h-full" src="<?php echo esc_url($image) ?>">
                    </figure>
                </div>
                <div class="w-1/2 flex flex-col justify-center <?php echo $image_position == "Right" ? 'pr-[70px]' : 'pl-[70px]' ?>">
                    <h3 class="text-east-bay text-[36px] font-[700] font-EBGaramond"> <?php echo $title ?></h3>
                    <div class="my-[30px] text-bombay leading-[30px] text-[18px]"><?php echo $text ?></div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>