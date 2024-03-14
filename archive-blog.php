<?php get_header();

// Load values and assign defaults.

$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;


$args = array(
    'post_type' => 'blog',
    'posts_per_page' => 6,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
);

$cards = new WP_Query($args);
$cards = $cards->posts;


?>
<main>
    <section class="">
        <div class="block_content px-[30px] lg:px-[75px]">
            <div class="bg-ebony h-[600px] rounded-[24px] py-[112px] px-[84px] relative flex justify-center items-center">
                <img class="hidden lg:block absolute left-[-310px] top-[-130px] rotate-[-8deg]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_white.png" />
                <div class="w-full lg:w-[60%]">
                    <h1 class="text-center"> Blog </h1>
                    <p class="text-white text-[18px] leading-[30px] mt-[20px] text-center">Lorem ipsum dolor sit amet consectetur rhoncus morbi cum enim aliquam cras eget justo laoreet tellus orci sed sit purus eget eget mauris nisi quam nibh imperdiet.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block_content px-[30px] lg:px-[75px] py-[100px]">
            <h2 class="text-start">Latest Blogs</h2>
            <div class="mt-[50px] flex flex-row flex-wrap gap-[28px] gap-y-[50px]">
                <?php foreach ($cards as $key => $card) :
                    $date = $card->post_date;
                    $newDate = date("F d, Y", strtotime($date));
                ?>
                    <div class="w-[31%] cursor-pointer">
                        <a href="<?php echo get_the_permalink($card->ID) ?>">
                            <figure>

                                <img class="rounded-[24px] h-[310px] object-cover w-full" src="<?php echo esc_url(get_the_post_thumbnail_url($card->ID)) ?>" alt="" srcset="">
                            </figure>
                            <h5 class="mt-[20px]"><?php echo $card->post_title ?> </h5>
                            <div class="mt-[10px]">
                                <span class="text-[16px] lg:text-[18px] text-east-bay"><?php echo esc_attr(get_author_name($card->post_author)) ?></span>
                                <span class="w-[28px]">-</span>
                                <span class="text-[16px] lg:text-[18px] text-east-bay"><?php echo esc_attr($newDate)  ?></span>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="pagination flex gap-[20px] justify-center mt-[86px]">
                <?php pagainate_link_function($wp_query); ?>
            </div>
        </div>
    </section>

</main>


<?php get_footer(); ?>