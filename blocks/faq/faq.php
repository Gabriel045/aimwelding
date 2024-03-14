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
$background     =  get_field("background");
$title          = get_field("title");
$faqs           = get_field('faqs');

?>

<section class="">
    <div class="block_content px-[75px] pb-[100px] <?php echo $background == "Dark"  ? 'pt-[100px]' : '' ?>">
        <div class=" <?php echo $background == "Dark"  ? 'bg-ebony' : 'bg-east-bay' ?> rounded-[24px] relative flex flex-col justify-center items-center mx-[30px] lg:mx-0 px-[40px] py-[75px] ">
            <img class="absolute top-[48%] lg:top-[-10%] left-[-9%] lg:left-[-9%] rotate-[-95deg] lg:rotate-[-105deg] w-[300px] lg:w-auto" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_white.png">
            <h3 class="text-[24px] lg:text-[56px] leading-[40px] lg:leading-[88px] text-white font-EBGaramond font-[700] lg:w-[60%] text-center relative z-10"> <?php echo $title ?></h3>
            <div class="w-[70%] mt-[64px]">
                <?php foreach ($faqs as $key => $item) : ?>
                    <div class="slider-faq ml-[-3px] pb-[45px] mb-[45px] lg:last:mb-0 last:border-b-0 border-b-[1px] border-[#ffffff4a] inactive" onclick="slideFaq(this, <?php echo $key ?>)">
                        <h4 class="text-[#FFF] text-[34px] font-[700] font-EBGaramond cursor-pointer relative"><?php echo $item['title'] ?> </h4>
                        <div class="item-content">
                            <p class="paragraph w-[70%] text-[#ffffff7a] text-[18px] leading-[30px] pt-[24px]"> <?php echo $item["paragraph"] ?> </p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <img class="absolute bottom-[-14%] rotate-[-46deg] right-[-300px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_white.png">
        </div>
    </div>
</section>

<script>
    let slideFaqItems = document.querySelectorAll(".slider-faq")
    slideFaqItems[0].classList.add("active")

    function slideFaq(slide, i) {
        slideFaqItems.forEach((item) => {
            let active = (item === slide) ? item.classList.add("active") : item.classList.remove("active")
        });
    }
</script>