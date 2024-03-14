<?php get_header();

$categories = get_the_terms($post->ID, 'blog-category');
$date = $post->post_date;
$newDate = date("F d, Y", strtotime($date));
?>

<main>
    <section id="hero-image" class="">
        <div class="block_content lg:pr-[156px] relative">
            <div class="relative bg-ebony min-h-[700px] pb-[150px]  lg:pb-[18px] pt-[18px] pl-[30px] lg:pl-[75px] pr-[30px] lg:pr-[24px] lg:rounded-r-[24px] flex flex-wrap lg:flex-nowrap" 
            style="background-repeat: no-repeat;background-position: 70% 45%; background-image:url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_gray.svg)">
                <div class="w-full lg:w-[50%] lg:pr-[80px] gap-y-[30px] flex flex-col justify-center">
                    <div class="mt-[10px]">
                        <span class="text-[16px] lg:text-[18px] text-white"><?php echo $categories[0]->name ?></span>
                        <span class="w-[28px] text-east-bay">-</span>
                        <span class="text-[16px] lg:text-[18px] text-white"><?php echo esc_attr($newDate)  ?></span>
                    </div>
                    <h1><?php echo the_title() ?></h1>
                    <p class="text-[#D8E5E9] text-[16px] lg:text-[18px] leading-[25px] lg:leading-[30px]"><?php echo get_the_excerpt() ?></p>
                </div>
                <div class="w-full lg:w-[50%] mt-[50px] lg:mt-0 flex items-center relative">
                    <figure class="z-[99] absolute w-[700px] h-[500px] top-[50%] translate-y-[-50%]">
                        <img class=" object-cover rounded-[24px] w-full h-full" src="<?php echo get_the_post_thumbnail_url() ?>">
                    </figure>
                </div>
            </div>
            <div class="lg:hidden block h-[100px]"></div>
        </div>
    </section>
    <section>
        <?php the_content() ?>
    </section>
</main>

<?php get_footer() ?>