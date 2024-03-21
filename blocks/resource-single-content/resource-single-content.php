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
$content       = get_field('content');
$url           = get_field('url');
?>

<section id="blog-content" class="">
    <div class="block_content flex flex-col-reverse lg:flex-row flex-wrap lg:flex-nowrap w-full py-[100px] px-[30px] lg:px-[75px]">
        <div id="titles" class="w-full lg:w-[60%] lg:pr-[80px] pt-[100px] lg:pt-0">
            <?php echo $content ?>
            <div id="list-resources" class=" bg-alice-blue rounded-[39px] py-[60px] lg:px-[60px] px-[30px] mt-[100px]">
                <h5 class="mb-[20px]">Resources</h5>
                <?php echo $url ?>
            </div>
        </div>
        <div class="w-full lg:w-[40%] flex flex-col">
            <div class="bg-alice-blue rounded-[10px] py-[60px] lg:px-[60px] px-[30px]">
                <h5>Table of content</h5>
                <div id="table-content" class="mt-[40px] border-l-[1px] border-[#a3b0cc42] pl-[20px]"></div>
            </div>
            <div class="mt-[30px] py-[60px] lg:px-[60px] px-[30px] bg-east-bay rounded-[10px]">
                <h5 class="text-white text-center">Questions About Treatment?</h5>
                <p class="text-center mt-[10px]">Reach out to Advaita Integrated Medicine today and let us guide you toward a full and rewarding life uninhibited by mental health or substance use disorder challenges. We are here to support you every step of the way.</p>
                <div class="w-full flex mt-[25px]">
                    <a href="/contact/" class="btn-dark w-full" style="padding:15px 38px; text-decoration:none;">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    titles = document.querySelectorAll("#titles h3")
    content = document.querySelector("#table-content")

    titles.forEach((title, index) => {
        title.setAttribute("id", index)
        content.innerHTML += `<span class="flex text-east-bay text-[16px] lg:text-[18px] leading-[30px] font-[500] mt-[10px] lg:mt-[20px]">${title.textContent}</span>`
    });
    console.log(titles);
</script>