<?php get_header();

$categories = get_the_terms($post->ID, 'blog-category');
$date = $post->post_date;
$newDate = date("F d, Y", strtotime($date));

// Load values and assign defaults.
$args = array(
    'post_type'      => 'blog',
    'posts_per_page' =>  3,
    'post__not_in'   => array($post->ID),
    'orderby'        => 'Date',
    'order'          => 'Desc',
    'post_status'    => 'publish'
);

$cards = new WP_Query($args);
$cards = $cards->posts;


?>

<main>
    <section id="hero-image" class="">
        <div class="block_content lg:pt-[20px] lg:px-[75px] relative">
            <div class="bg-custom relative bg-ebony lg:min-h-[700px] pb-[0px]  lg:pb-[18px] pt-[100px] lg:pt-[18px] pl-[30px] lg:pl-[75px] pr-[30px] lg:pr-[24px] lg:rounded-[24px] flex flex-wrap lg:flex-nowrap">
                <div class="w-full lg:w-[50%] lg:pr-[80px] gap-y-[30px] flex flex-col justify-center">
                    <div class="mt-[10px] flex gap-[16px]">
                        <span class="text-[16px] lg:text-[18px] text-white"><a href="<?php echo "/" . $categories[0]->taxonomy . "/" . $categories[0]->slug   ?>"><?php echo $categories[0]->name ?></a></span>
                        <?php if (!empty($categories[0])) : ?>
                            <span class="flex items-center">
                                <span class="w-[28px] bg-east-bay h-[1px]"></span>
                            </span>
                        <?php endif ?>
                        <span class="text-[16px] lg:text-[18px] text-white"><?php echo esc_attr($newDate)  ?></span>
                    </div>
                    <h1><?php echo the_title() ?></h1>
                    <p class="text-[#D8E5E9] text-[16px] lg:text-[18px] leading-[25px] lg:leading-[30px]"><?php echo get_the_excerpt() ?></p>
                </div>
                <div class="w-full lg:w-[50%] mt-0 flex items-center relative h-[350px] lg:h-auto">
                    <figure class="z-[99] absolute lg:w-[700px] h-[400px] lg:h-[500px] bottom-[-90px] lg:bottom-0 lg:top-[50%] lg:translate-y-[-50%]">
                        <img class=" object-cover rounded-[24px] w-full h-full" src="<?php echo get_the_post_thumbnail_url() ?>">
                    </figure>
                </div>
            </div>
            <div class="lg:hidden block h-[100px]"></div>
        </div>
    </section>
    <article class="flex justify-center">
        <div class="block_content px-[30px] lg:px-[330px] pt-[100px] lg:py-[160px]">
            <?php the_content() ?>
        </div>
    </article>
    <section>
        <div class=" block_content flex flex-col items-center px-[30px] lg:px-[75px] pt-[100px] lg:pt-0">
            <a href=" /">
                <img class="w-[188px]" src="<?php esc_url(the_field('logo', 'option'))  ?>" alt="">
            </a>
            <div class="flex justify-center">
                <p class="my-[24px] text-[18px] font-[500] leading-[30px] text-east-bay text-center lg:w-[460px]">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.
                </p>

            </div>
            <div class="flex flex-row mt-[20px] gap-[16px]">
                <a href="<?php echo get_field('footer', 'option')['social_media']['facebook'] ?>" target="_blank">
                    <img style="filter: brightness(0) saturate(100%) invert(7%) sepia(8%) saturate(7060%) hue-rotate(204deg) brightness(97%) contrast(97%);" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facebook.svg" alt="" srcset="">
                </a>
                <a href="<?php echo get_field('footer', 'option')['social_media']['twitter'] ?>" target="_blank">
                    <img style="filter: brightness(0) saturate(100%) invert(7%) sepia(8%) saturate(7060%) hue-rotate(204deg) brightness(97%) contrast(97%);" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/twitter.svg" alt="" srcset="">
                </a>
                <a href="<?php echo get_field('footer', 'option')['social_media']['instagram'] ?>" target="_blank">
                    <img style="filter: brightness(0) saturate(100%) invert(7%) sepia(8%) saturate(7060%) hue-rotate(204deg) brightness(97%) contrast(97%);" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/instagram.svg" alt="" srcset="">
                </a>
                <a href="<?php echo get_field('footer', 'option')['social_media']['linkedin'] ?>" target="_blank">
                    <img style="filter: brightness(0) saturate(100%) invert(7%) sepia(8%) saturate(7060%) hue-rotate(204deg) brightness(97%) contrast(97%);" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/linkedin.svg" alt="" srcset="">
                </a>
                <a href="<?php echo get_field('footer', 'option')['social_media']['youtube'] ?>" target="_blank">
                    <img style="filter: brightness(0) saturate(100%) invert(7%) sepia(8%) saturate(7060%) hue-rotate(204deg) brightness(97%) contrast(97%);" class="mt-[4px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/youtube.svg" alt="" srcset="">
                </a>
                <a href="<?php echo get_field('footer', 'option')['social_media']['whatsapp'] ?>" target="_blank">
                    <img style="filter: brightness(0) saturate(100%) invert(7%) sepia(8%) saturate(7060%) hue-rotate(204deg) brightness(97%) contrast(97%);" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/whatsapp.svg" alt="" srcset="">
                </a>
            </div>
            <div class="bg-ebony mt-[70px] w-full rounded-[24px] px-[50px] lg:px-[74px] py-[90px] flex flex-wrap lg:flex-nowrap" style="background-repeat: no-repeat; background-position:right; background-image:url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/Group.png)">
                <div class="flex items-center w-full lg:w-[50%]">
                    <p class="lg:w-[480px] text-[24px] lg:text-[58px] leading-[20px] lg:leading-[66px] font-EBGaramond font-[700] text-white text-center lg:text-start"> Subscribe to our weekly newsletter </p>
                </div>
                <div class="w-full lg:w-[50%] flex items-center mt-[30px] lg:mt-0">
                    <?php echo do_shortcode('[gravityform id="1" title="false"]') ?>
                </div>
            </div>
        </div>
    </section>
    <section id="" class="">
        <div class="block_content px-[30px] lg:px-[75px] pb-[30px] pt-[100px]">
            <div class="flex justify-between">
                <h2 class="w-full lg:w-[60%] text-center lg:text-start">Latest Blogs</h2>
                <div class="hidden lg:block w-fit">
                    <a href="/blog/" class="btn-light ">Browse all articles</a>
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
                            <div class="mt-[10px]">
                                <span class="text-[16px] lg:text-[18px] text-east-bay"><?php echo esc_attr(get_author_name($card->post_author)) ?></span>
                                <span class="w-[28px]">-</span>
                                <span class="text-[16px] lg:text-[18px] text-east-bay"><?php echo esc_attr($newDate)  ?></span>
                            </div>
                        </a>
                    </article>
                <?php endforeach ?>
            </div>
            <div class="flex lg:hidden mt-[50px]  justify-center">
                <a href="/blog/" class="btn-light ">Browse all articles</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer() ?>

