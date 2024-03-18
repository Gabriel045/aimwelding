<?php get_header(); ?>


<main>
    <section class="">
        <div class="block_content px-0 lg:px-[75px] pt-[20px]">
            <div class="bg-ebony lg:rounded-[24px] py-[112px] px-[30px] lg:px-[84px] relative">
                <img class="absolute right-[-76px] bottom-[-58px] rotate-[80deg]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/ribbon_white.png" />
                <div class="w-full lg:w-[80%]">
                    <h1><?php echo get_the_title() ?></h1>
                    <p class="text-white text-[18px] leading-[30px] mt-[20px]"><?php echo $post->post_excerpt ?></p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block_content px-[30px] lg:px-[200px] py-[50px] lg:py-[100px]">
            <?php the_content() ?>
        </div>
    </section>
    <section>
        <div class="block_content pb-[100px] px-[30px] lg:px-[287px] flex flex-col items-center">
            <div class="flex lg:flex-row  flex-col  items-start lg:justify-between gap-[30px] lg:gap-0 w-fil lg:w-full">
                <div class="text-bombay text-[16px] flex flex-row">
                    <img class="mr-[8px] mt-[-4px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector (9).svg">
                    Job Category: <span class="text-ebony ml-[4px]"> <?php the_field("job_category") ?></span>
                </div>
                <div class="text-bombay text-[16px] flex flex-row">
                    <img class="mr-[8px] mt-[-4px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector (10).svg">
                    Approval by: <span class="text-ebony ml-[4px]"> <?php the_field("approval_by") ?></span>
                </div>
                <div class="text-bombay text-[16px] flex flex-row">
                    <img class="mr-[8px] mt-[-4px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/paper.svg">
                    Reports to: <span class="text-ebony ml-[4px]"> <?php the_field("reports_to") ?></span>
                </div>
            </div>
            <div class="flex justify-center w-full">
                <div class="lg:max-w-[665px] w-full mt-[30px] lg:mt-[100px]">
                    <div id="job-form" class="bg-alice-blue rounded-[24px] p-[45px]">
                        <?php echo  do_shortcode("[gravityform id='2' title='false']") ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>