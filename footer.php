<footer>
    <section>
        <div class="block_content px-[30px] lg:px-[74px] pt-[74px] pb-[40px]">
            <div class="flex flex-wrap lg:flex-nowrap">
                <div class=" w-full lg:w-[30%]">
                    <a href="/">
                        <img class="w-[188px]" src="<?php esc_url(the_field('logo', 'option'))  ?>" alt="">
                    </a>
                    <p class="mt-[18px] leading-[30px] text-bombay"><?php echo (get_field('footer', 'option')['footer_text'])  ?></p>
                    <div class="flex flex-row mt-[20px] gap-[16px]">
                        <a href="<?php echo get_field('footer', 'option')['social_media']['facebook'] ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facebook.svg" alt="" srcset="">
                        </a>
                        <a href="<?php echo get_field('footer', 'option')['social_media']['twitter'] ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/twitter.svg" alt="" srcset="">
                        </a>
                        <a href="<?php echo get_field('footer', 'option')['social_media']['instagram'] ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/instagram.svg" alt="" srcset="">
                        </a>
                        <a href="<?php echo get_field('footer', 'option')['social_media']['linkedin'] ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/linkedin.svg" alt="" srcset="">
                        </a>
                        <a href="<?php echo get_field('footer', 'option')['social_media']['youtube'] ?>" target="_blank">
                            <img class="mt-[4px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/youtube.svg" alt="" srcset="">
                        </a>
                        <a href="<?php echo get_field('footer', 'option')['social_media']['whatsapp'] ?>" target="_blank">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/whatsapp.svg" alt="" srcset="">
                        </a>
                    </div>
                </div>
                <div class="w-full lg:w-[70%] flex flex-wrap lg:flex-nowrap lg:justify-end">
                    <div class="w-full lg:w-[70%] flex flex-col  mt-[50px] lg:mt-0">
                        <h5 class="font-EBGaramond font-[700] text-[22px] text-east-bay">Main pages</h5>
                        <div class="parent-grid mt-[32px]">
                            <?php echo  wp_nav_menu(array(
                                'menu'   => 'Footer Menu',
                            ));  ?>
                        </div>
                    </div>
                    <div class="lg:ml-[80px] mt-[50px] lg:mt-0">
                        <h5 class="font-EBGaramond font-[700] text-[22px] text-east-bay"> Utility pages</h5>
                        <div class="mt-[32px]">
                            <?php echo  wp_nav_menu(array(
                                'menu'   => 'Footer Utility pages',
                            ));  ?>
                        </div>
                        <p class="text-east-bay text-[18px] font-[700] mt-[18px]">more webflow <br> templates</p>
                    </div>
                </div>
            </div>
            <div class="bg-ebony mt-[70px] rounded-[24px] px-[50px] lg:px-[74px] py-[67px] flex flex-wrap lg:flex-nowrap" style="background-repeat: no-repeat; background-position:right; background-image:url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/Group.png)">
                <div class="w-full lg:w-[50%] text-[24px] lg:text-[38px] leading-[20px] lg:leading-[45px] font-EBGaramond font-[700] text-white text-center lg:text-start">
                    Subscribe to our weekly newsletter
                </div>
                <div class="w-full lg:w-[50%] flex items-center mt-[30px] lg:mt-0">
                    <?php echo do_shortcode('[gravityform id="1" title="false"]') ?>
                </div>
            </div>
            <p class="text-ebony  text-[16px] lg:text-[18px] text-center mt-[30px]">Copyright © Medic X | Designed by BRIX Templates - Powered by Webflow</p>
        </div>  
    </section>
</footer>

<?php wp_footer(); ?>
</body>

</html>