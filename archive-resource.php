<?php get_header();

// Load values and assign defaults.

$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;


$args = array(
    'post_type' => 'resource',
    'posts_per_page' => 6,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
);

$cards = new WP_Query($args);
$cards = $cards->posts;

$newDate = date("F d, Y");
?>
<main>
    <section>
        <div class="block_content px-[30px] lg:px-[74px] mt-[50px] lg:pt-[100px] pb-[64px] flex flex-col items-center">
            <h1 class="w-full text-start lg:text-center text-ebony ">Resources</h1>
            <p class="text-[18px] text-east-bay leading-[30px] mt-[16px] lg:w-[60%] text-start lg:text-center">Lorem ipsum dolor sit amet consectetur rhoncus morbi cum enim aliquam cras eget justo laoreet tellus orci sed sit purus eget eget mauris nisi quam nibh imperdiet.</p>
        </div>
    </section>
    <section id="hero-image-left" class="relative">
        <img class="img-bg hidden lg:block absolute z-[9] left-[10px] bottom-[0px] rotate-[50deg]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_gray.svg">
        <div class="block_content lg:pt-[20px] lg:px-[75px] relative">
            <div class="bg-custom relative bg-ebony lg:min-h-[700px] pb-[0px]  lg:pb-[18px] pt-[50px] lg:pt-[18px] pl-[30px] lg:pl-[75px] pr-[30px] lg:pr-[24px] lg:rounded-[24px] flex flex-wrap lg:flex-nowrap flex-col-reverse lg:flex-row">
                <div class="w-full lg:w-[50%] mt-0 flex items-center relative h-[350px] lg:h-auto">
                    <figure class="left-image z-[99] absolute lg:w-[600px] h-[400px] lg:h-auto lg:left-[-140px] bottom-[-98px] lg:bottom-0 lg:top-[50%] lg:translate-y-[-50%]">
                        <img class=" object-cover rounded-[24px] w-full h-full" src="<?php echo get_the_post_thumbnail_url() ?>">
                    </figure>
                </div>
                <div class="w-full lg:w-[50%] lg:pr-[74px] gap-y-[30px] flex flex-col justify-center">
                    <h1>Lorem ipsum dolor sit amet consectetur ut commodo gravida</h1>
                    <p class="text-[#D8E5E9] text-[16px] lg:text-[18px] leading-[25px] lg:leading-[30px]">Lorem ipsum dolor sit amet consectetur ut commodo gravida viverra quis mattis non aliquet bibendum aliquam varius duis.</p>
                    <div class="flex justify-between gap-[16px] border-t-[1px] border-east-bay pt-[30px]">
                        <div class="flex items-center gap-[10px]">
                            <span class="text-[16px] font-[500] lg:text-[18px] text-white">Tips</span>
                            <span class="flex items-center">
                                <span class="w-[28px] bg-east-bay h-[1px]"></span>
                            </span>
                            <span class="text-[16px] font-[500] lg:text-[18px] text-white"><?php echo esc_attr($newDate)  ?></span>
                        </div>
                        <div>
                            <a href="#" class="read-art hidden lg:flex text-white text-[18px]  hover-arrow">
                                Read articles
                                <img class="arrow ml-[10px] mr-[5px]" style="filter: brightness(0) saturate(100%) invert(97%) sepia(0%) saturate(664%) hue-rotate(337deg) brightness(106%) contrast(101%);" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/arrow-right-blue.svg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:hidden block h-[100px]"></div>
        </div>
    </section>

    <section>
        <div class="block_content px-[30px] lg:px-[75px] py-[100px]">
            <h2 class="text-start">Latest resources</h2>
            <div class="mt-[50px] flex flex-row flex-wrap gap-[28px] gap-y-[50px]">
                <?php foreach ($cards as $key => $card) :
                    $date = $card->post_date;
                    $newDate = date("F d, Y", strtotime($date));
                ?>
                    <div class="w-full lg:w-[31.85%] cursor-pointer">
                        <a href="<?php echo get_the_permalink($card->ID) ?>">
                            <figure>

                                <img class="rounded-[24px] h-[310px] object-cover w-full" src="<?php echo esc_url(get_the_post_thumbnail_url($card->ID)) ?>" alt="" srcset="">
                            </figure>
                            <h5 class="mt-[20px]"><?php echo $card->post_title ?> </h5>
                            <div class="mt-[10px] flex gap-[16px]">
                                <span class="text-[16px] lg:text-[18px] text-east-bay"><?php echo esc_attr(get_author_name($card->post_author)) ?></span>
                                <span class="flex items-center">
                                    <span class="w-[28px] bg-east-bay h-[1px]"></span>
                                </span>
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