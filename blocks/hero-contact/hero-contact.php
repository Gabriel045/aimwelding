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

$title                       = get_field('title');
$mail                        = get_field('mail');
$phone                       = get_field('phone');
$follow_us_text              = get_field('follow_us_text');
$upper_paragraph             = get_field('upper_paragraph');
$more_contact_information    = get_field('more_contact_information');

?>

<section id="hero-contact" class="">
    <div class="block_content lg:pt-[20px] lg:px-[75px] relative">
        <div class="bg-custom relative bg-ebony lg:min-h-[850px] pb-[0px]  lg:pb-[18px] pt-[100px] lg:pt-[114px] pl-[30px] lg:pl-[75px] pr-[30px] lg:pr-[75px] lg:rounded-[24px] flex flex-wrap lg:flex-nowrap">
            <img decoding="async" class="hidden lg:block absolute  right-0 bottom-[0] z-1" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Mask group.svg">
            <div class="w-full lg:w-[40%] lg:pr-[80px]flex flex-col">
                <h1><?php echo $title ?></h1>
                <h4 class="text-white mt-[50px] mb-[15px]">More contact information</h4>
                <p class="text-[#D8E5E9] text-[16px] lg:text-[18px] leading-[25px] lg:leading-[30px]"><?php echo $more_contact_information ?></p>
                <div class="mt-[30px] flex flex-nowrap flex-row justify-between">
                    <div class="w-[50%] flex flex-col gap-y-[12px] text-white">
                        <span class="font-[18px]">
                            Email address
                        </span>
                        <span class="font-EBGaramond text-[22px] font-[700]">
                            <?php echo $mail ?>
                        </span>
                    </div>
                    <div class="w-[50%] flex flex-col gap-y-[12px] text-white">
                        <span class="font-[18px]">
                            Phone number
                        </span>
                        <span class="font-EBGaramond text-[22px] font-[700]">
                            <?php echo $phone ?>
                        </span>
                    </div>
                </div>
                <div class="pt-[40px] mt-[40px] border-t-[1px] border-[#405789]">
                    <h4 class="text-white">Follow us</h4>
                    <p class="text-white mt-[15px]"><?php echo $follow_us_text ?></p>
                    <div class="flex flex-row mt-[20px] gap-[16px]">
                        <a href="<?php echo get_field('footer', 'option')['social_media']['facebook'] ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facebook.svg" alt="" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7500%) hue-rotate(1deg) brightness(100%) contrast(106%);">
                        </a>
                        <a href="<?php echo get_field('footer', 'option')['social_media']['twitter'] ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/twitter.svg" alt="" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7500%) hue-rotate(1deg) brightness(100%) contrast(106%);">
                        </a>
                        <a href="<?php echo get_field('footer', 'option')['social_media']['instagram'] ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/instagram.svg" alt="" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7500%) hue-rotate(1deg) brightness(100%) contrast(106%);">
                        </a>
                        <a href="<?php echo get_field('footer', 'option')['social_media']['linkedin'] ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/linkedin.svg" alt="" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7500%) hue-rotate(1deg) brightness(100%) contrast(106%);">
                        </a>
                        <a href="<?php echo get_field('footer', 'option')['social_media']['youtube'] ?>" target="_blank">
                            <img class="mt-[4px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/youtube.svg" alt="" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7500%) hue-rotate(1deg) brightness(100%) contrast(106%);">
                        </a>
                        <a href="<?php echo get_field('footer', 'option')['social_media']['whatsapp'] ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/whatsapp.svg" alt="" style="filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7500%) hue-rotate(1deg) brightness(100%) contrast(106%);">
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-[60%] mt-0 flex flex-col  h-[350px] lg:h-auto items-end relative">
                <p class="text-[#D8E5E9] w-[418px] text-[18px]"><?php echo $upper_paragraph ?></p>
                <div id="job-form" class="bg-alice-blue rounded-[24px] p-[40px] w-[655px] mt-[65px] absolute bottom-[-100px]">
                    <?php echo do_shortcode('[gravityform id="2" title="false"]') ?>
                </div>
            </div>
        </div>
        <div class="h-[100px]"></div>
    </div>
</section>