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

if($background == "Dark"){
    $bg = "bg-ebony";
}else if($background == "Light Blue"){
    $bg = "bg-alice-blue";
}else{
    $bg = "bg-east-bay";
}

?>

<section id="faq" class="">
    <div class="block_content p-[30px] lg:px-[75px] pb-[100px] <?php echo $background == "Dark"  ? 'pt-[100px]' : '' ?>">
        <div class="<?php echo $bg ?> rounded-[24px] relative flex flex-col justify-center items-center mx-0 px-[34px] lg:px-[40px] py-[75px] ">
            <img class="absolute  top-[-6%] lg:top-[-10%] left-[-18%] lg:left-[-9%] rotate-[-95deg] lg:rotate-[-105deg] w-[200px] lg:w-auto" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_white.png">
            <h3 class="text-[22px] lg:text-[58px] leading-[40px] lg:leading-[88px] text-white font-EBGaramond font-[700] lg:w-[60%] text-center relative z-10"> <?php echo $title ?></h3>
            <div class="w-full lg:w-[70%] mt-[37px] lg:mt-[64px]">
                <?php foreach ($faqs as $key => $item) : ?>
                    <div class="slider-faq ml-[-3px] pb-[45px] mb-[45px] last:mb-0 last:border-b-0 border-b-[1px] border-[#ffffff4a] z-[99] relative  inactive " onclick="slideFaq(this, <?php echo $key ?>)">
                        <h4 class="text-[#FFF] w-[92%] lg:w-full text-[19px] lg:text-[34px] font-[700] font-EBGaramond cursor-pointer "><?php echo $item['title'] ?> </h4>
                        <div class="item-content">
                            <p class="paragraph w-[95%] lg:w-[70%] text-[#ffffff7a] text-[14px] lg:text-[18px] leading-[20px] lg:leading-[30px] pt-[24px]"> <?php echo $item["paragraph"] ?> </p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <img class="absolute bottom-[-55px] lg:bottom-[-14%] rotate-[-194deg] lg:rotate-[-46deg] lg:right-[-300px] left-[-60px] lg:left-auto w-[200px] lg:w-auto" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_white.png">
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