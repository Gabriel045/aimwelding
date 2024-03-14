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

  <header class="overflow-x-clip relative flex justify-center">
    <div class="block_content px-[30px] lg:px-[75px] py-[20px] flex flex-row z-[99]">
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
          <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-dark hidden lg:flex" style="padding: 15px 20px;"><?php echo esc_attr($cta["title"]) ?>l</a>
        </div>
      </div>
    </div>

    <!-- mobile -->
    <div id="menu-mobile" class="menu-mobile-container block lg:hidden">
      <div class="div px-[40px] pb-[70px] pt-[120px]">
        <?php echo  wp_nav_menu(array(
          'menu'   => 'Header menu',
        ));  ?>

      </div>
      <div class="flex justify-center">
        <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-dark lg:hidden flex" style="padding: 15px 20px;"><?php echo esc_attr($cta["title"]) ?>l</a>
      </div>
    </div>

  </header>

  <script>
    let mobile = document.querySelector(".menu-mobile")
    mobile.addEventListener('click', () => {
      document.querySelector(".menu-mobile-container").classList.toggle('active')
      document.querySelector("#nav-icon4").classList.toggle('open')
    })


    //Mobile
    let itemsMobile = document.querySelectorAll("#menu-mobile .menu-item-has-children")
    itemsMobile.forEach((a) => {
      a.addEventListener("click", () => {
        a.querySelector("ul").classList.toggle("show");
        a.classList.toggle("rotate");
      })
    })


    // disable Herf to some items in the menu
    let menuItems = document.querySelectorAll(".menu-item-has-children a")
    let result = menuItems.forEach((item) => {
      item.removeAttribute("href")

    })
  </script>