<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>AIM Welding</title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open();
  $cta = get_field('header', 'option')["cta"]; ?>
  <header>
    <section>
      <div class="block_content px-[75px] py-[20px] flex flex-row">
        <div class="w-1/2 lg:w-[16%] flex items-center">
          <a href="/">
            <img class="w-[188px]" src="<?php esc_url(the_field('logo', 'option'))  ?>" alt="">
          </a>
        </div>
        <div id="menu-dektop" class="lg:w-[84%] w-[50%] flex justify-end items-center gap-[25px]">
          <?php echo  wp_nav_menu(array(
            'menu'   => 'Header Menu',
          ));  ?>

          <div class="">
            <span class="inline-block lg:hidden cursor-pointer menu-mobile">
              <div class="" id="nav-icon4">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </span>
            <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn_dark hidden lg:flex"><?php echo esc_attr($cta["title"]) ?>l</a>
          </div>

        </div>
      </div>
    </section>
  </header>