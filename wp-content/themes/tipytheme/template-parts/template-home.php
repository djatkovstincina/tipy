<?php
/*
    Template Name: Homepage
*/
global $globalSite;
global $show;
get_header();
// Header
$header_title = get_field('header_title');
$header_text = get_field('header_text');
$header_button = get_field('header_button');
$header_image = get_field('header_image');
$header_button_url = $header_button['url'];
$header_button_title = $header_button['title'];
$header_card_title = get_field('header_card_title');
$header_background_image = get_field('header_background_image');
$header_card_image_text = get_field('header_card_image_text');
// How it works
$how_title = get_field('how_title');
// Who Is It For
$for_title = get_field('for_title');
$for_subtitle = get_field('for_subtitle');
$for_text = get_field('for_text');
// Join Tipy
$join_title = get_field('join_title');
$join_text = get_field('join_text');
$join_button = get_field('join_button');
$join_image = get_field('join_image');
// Testimonials
$testimonials_subtitle = get_field('testimonials_subtitle');
$testimonials_title = get_field('testimonials_title');
// How to use Tipy
$video_title = get_field('video_title');
$video_text = get_field('video_text');
$video_choice = get_field('video_choice');
$mp = get_field('video_mp4');
$webm = get_field('video_webm');
$ogg = get_field('video_ogg');
$video_thumb = get_field('video_thumb');
$embed = get_field('embedded_video');
if ($embed) {
    preg_match('/src="(.+?)"/', $embed, $matches);
    $src = $matches[1];
    $params = array(
        'controls'    => 1,
        'hd'        => 1,
        'rel' => 0,
        'autohide'    => 1,
        'loop'    => 1,
        'autoplay' => 0,
        'showinfo' => 0,
        'muted' => 0
    );
    $new_src = add_query_arg($params, $src);
    $embed = str_replace($src, $new_src, $embed);
    $attributes = 'frameborder="0"';
    $embed = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $embed);
}
// Join Tipy Two
$join_two_title = get_field('join_two_title');
$join_two_text = get_field('join_two_text');
$join_two_button = get_field('join_two_button');
$join_two_image = get_field('join_two_image');

?>
<div id="content" class="site-content">
    <main id="main" class="page-main site-main" role="main">
        <section class="section header">
            <div class="wrapper">
                <div class="wrap">
                    <div class="md-7">
                        <?php if ($header_title) : ?>
                            <h1 class="header-title"><?php echo $header_title; ?></h1>
                        <?php endif; ?>
                        <?php if ($header_text) : ?>
                            <p class="header-text"><?php echo $header_text; ?></p>
                        <?php endif; ?>
                        <?php if ($header_button) : ?>
                            <a class="primary-btn" href="<?php echo esc_url($header_button_url); ?>">
                                <div class="btn-text">
                                    <?php echo esc_html($header_button_title); ?>
                                </div>
                                <div class="btn-arrow">
                                    <img src="<?php echo $globalSite['theme_url'] . '/src/img/Button-arrow-white.svg'; ?>" />
                                </div>
                            </a>
                        <?php endif; ?>
                        <div class="header-card desktop">
                            <h3><?php echo $header_card_title; ?></h3>
                            <div class="header-card-images">
                                <?php
                                if (have_rows('header_card_images')) :
                                    while (have_rows('header_card_images')) : the_row();
                                        $header_card_image = get_sub_field('header_card_image'); ?>
                                        <div class="header-card-image">
                                            <img src="<?php echo $header_card_image; ?>" />
                                        </div>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                                <div class="header-card-image">
                                    <div class="header-card-image-text">
                                        <?php if ($header_card_image_text) :
                                            echo $header_card_image_text;
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md-5">
                        <?php if ($header_image) : ?>
                            <img class="header-image" src="<?php echo $header_image; ?>" />
                        <?php endif; ?>
                        <div class="header-card mobile">
                            <h3><?php echo $header_card_title; ?></h3>
                            <div class="header-card-images">
                                <?php
                                if (have_rows('header_card_images')) :
                                    while (have_rows('header_card_images')) : the_row();
                                        $header_card_image = get_sub_field('header_card_image'); ?>
                                        <div class="header-card-image">
                                            <img src="<?php echo $header_card_image; ?>" />
                                        </div>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                                <div class="header-card-image">
                                    <div class="header-card-image-text">
                                        <?php if ($header_card_image_text) :
                                            echo $header_card_image_text;
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-circles">
                <div class="header-circle one"></div>
                <div></div>
                <div class="header-circle two"></div>
                <div class="header-circle three"></div>
                <div></div>
                <div class="header-circle four"></div>
            </div>
            <div class="wrapper-fluid">
                <div class="wrap">
                    <div class="md-12">
                        <div class="header-background-image" style="background-image: url('<?php echo $header_background_image; ?>');"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="how_it_works" class="section how">
            <div class="wrapper">
                <div class="wrap">
                    <div class="md-12">
                        <h1 class="how-title"><?php echo $how_title; ?></h1>
                    </div>
                </div>
                <div class="wrap align-center">
                    <?php
                    if (have_rows('row_one')) :
                        while (have_rows('row_one')) : the_row();
                            $title = get_sub_field('title');
                            $image_one = get_sub_field('image_one');
                            $subtitle = get_sub_field('subtitle');
                            $text = get_sub_field('text');
                            $subtitle_two = get_sub_field('subtitle_two');
                            $text_two = get_sub_field('text_two'); ?>

                            <div class="md-5">
                                <span class="item-number">01</span>
                                <h2 class="item-title">
                                    <span class="item-title-icon">
                                        <img src="<?php echo $globalSite['theme_url'] . '/src/img/Title-arrow.svg'; ?>" />
                                    </span>
                                    <?php echo $title; ?>
                                </h2>
                                <div class="item-wrap">
                                    <h3><?php echo $subtitle; ?></h3>
                                    <p><?php echo $text; ?></p>
                                </div>
                                <div class="item-wrap">
                                    <h3><?php echo $subtitle_two; ?></h3>
                                    <p><?php echo $text_two; ?></p>
                                </div>
                            </div>
                            <div class="md-7">
                                <div class="how-image">
                                    <img src="<?php echo $image_one; ?>" />
                                    <div class="how-image-back">
                                        <div class="how-image-circles">
                                            <div class="how-image-circle one"></div>
                                            <div></div>
                                            <div></div>
                                            <div class="how-image-circle two"></div>
                                            <div class="how-image-circle three"></div>
                                            <div></div>
                                            <div></div>
                                            <div class="how-image-circle four"></div>
                                            <div class="how-image-circle five"></div>
                                            <div></div>
                                            <div class="how-image-circle six"></div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif; ?>
                </div>
                <div class="wrap align-center reverse">
                    <?php
                    if (have_rows('row_two')) :
                        while (have_rows('row_two')) : the_row();
                            $title = get_sub_field('title');
                            $image_two = get_sub_field('image_two');
                            $subtitle = get_sub_field('subtitle');
                            $text = get_sub_field('text');
                            $subtitle_two = get_sub_field('subtitle_two');
                            $text_two = get_sub_field('text_two'); ?>

                            <div class="md-7">
                                <div class="how-image">
                                    <img src="<?php echo $image_two; ?>" />
                                    <div class="how-image-back">
                                        <div class="how-image-circles">
                                            <div class="how-image-circle one"></div>
                                            <div></div>
                                            <div></div>
                                            <div class="how-image-circle two"></div>
                                            <div class="how-image-circle three"></div>
                                            <div></div>
                                            <div></div>
                                            <div class="how-image-circle four"></div>
                                            <div class="how-image-circle five"></div>
                                            <div></div>
                                            <div class="how-image-circle six"></div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md-5">
                                <span class="item-number">02</span>
                                <h2 class="item-title">
                                    <span class="item-title-icon">
                                        <img src="<?php echo $globalSite['theme_url'] . '/src/img/Title-arrow.svg'; ?>" />
                                    </span>
                                    <?php echo $title; ?>
                                </h2>
                                <div class="item-wrap">
                                    <h3><?php echo $subtitle; ?></h3>
                                    <p><?php echo $text; ?></p>
                                </div>
                                <div class="item-wrap">
                                    <h3><?php echo $subtitle_two; ?></h3>
                                    <p><?php echo $text_two; ?></p>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif; ?>
                </div>
                <div class="wrap align-center">
                    <?php
                    if (have_rows('row_three')) :
                        while (have_rows('row_three')) : the_row();
                            $title = get_sub_field('title');
                            $image_three = get_sub_field('image_three');
                            $subtitle = get_sub_field('subtitle');
                            $text = get_sub_field('text');
                            $subtitle_two = get_sub_field('subtitle_two');
                            $text_two = get_sub_field('text_two');
                            $subtitle_three = get_sub_field('subtitle_three');
                            $text_three = get_sub_field('text_three'); ?>

                            <div class="md-5">
                                <span class="item-number">03</span>
                                <h2 class="item-title">
                                    <span class="item-title-icon">
                                        <img src="<?php echo $globalSite['theme_url'] . '/src/img/Title-arrow.svg'; ?>" />
                                    </span>
                                    <?php echo $title; ?>
                                </h2>
                                <div class="item-wrap">
                                    <h3><?php echo $subtitle; ?></h3>
                                    <p><?php echo $text; ?></p>
                                </div>
                                <div class="item-wrap">
                                    <h3><?php echo $subtitle_two; ?></h3>
                                    <p><?php echo $text_two; ?></p>
                                </div>
                                <div class="item-wrap">
                                    <h3><?php echo $subtitle_three; ?></h3>
                                    <p><?php echo $text_three; ?></p>
                                </div>
                            </div>
                            <div class="md-7">
                                <div class="how-image">
                                    <img src="<?php echo $image_three; ?>" />
                                    <div class="how-image-back">
                                        <div class="how-image-circles">
                                            <div class="how-image-circle one"></div>
                                            <div></div>
                                            <div></div>
                                            <div class="how-image-circle two"></div>
                                            <div class="how-image-circle three"></div>
                                            <div></div>
                                            <div></div>
                                            <div class="how-image-circle four"></div>
                                            <div class="how-image-circle five"></div>
                                            <div></div>
                                            <div class="how-image-circle six"></div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif; ?>
                </div>
            </div>
        </section>
        <section id="who_is_it_for" class="section for">
            <div class="wrapper">
                <div class="wrap">
                    <div class="md-4">
                        <h1 class="for-title"><?php echo $for_title; ?></h1>
                        <h3 class="for-subtitle"><?php echo $for_subtitle; ?></h3>
                        <p class="for-text"><?php echo $for_text; ?></p>
                    </div>
                    <div class="md-8">
                        <div class="for-cards">
                            <?php
                            if (have_rows('card_one')) :
                                while (have_rows('card_one')) : the_row();
                                    $title_one = get_sub_field('title_one');
                                    $text_one = get_sub_field('text_one'); ?>
                                    <div class="for-card one">
                                        <h3 class="for-card-subtitle"><?php echo $title_one; ?></h3>
                                        <p class="for-card-text"><?php echo $text_one; ?></p>
                                        <img class="for-card-image one" src="<?php echo $globalSite['theme_url'] . '/src/img/Restaurants.svg'; ?>" />
                                        <div class="for-card-image circle one"></div>
                                    </div>
                            <?php
                                endwhile;
                            endif; ?>
                            <?php
                            if (have_rows('card_two')) :
                                while (have_rows('card_two')) : the_row();
                                    $title_two = get_sub_field('title_two');
                                    $text_two = get_sub_field('text_two'); ?>
                                    <div class="for-card two">
                                        <h3 class="for-card-subtitle"><?php echo $title_two; ?></h3>
                                        <p class="for-card-text"><?php echo $text_two; ?></p>
                                        <img class="for-card-image two" src="<?php echo $globalSite['theme_url'] . '/src/img/Scissors.png'; ?>" />
                                    </div>
                            <?php
                                endwhile;
                            endif; ?>
                            <?php
                            if (have_rows('card_three')) :
                                while (have_rows('card_three')) : the_row();
                                    $title_three = get_sub_field('title_three');
                                    $text_three = get_sub_field('text_three'); ?>
                                    <div class="for-card three">
                                        <h3 class="for-card-subtitle"><?php echo $title_three; ?></h3>
                                        <p class="for-card-text"><?php echo $text_three; ?></p>
                                        <img class="for-card-image three" src="<?php echo $globalSite['theme_url'] . '/src/img/Hotels.png'; ?>" />
                                    </div>
                            <?php
                                endwhile;
                            endif; ?>
                            <?php
                            if (have_rows('card_four')) :
                                while (have_rows('card_four')) : the_row();
                                    $title_four = get_sub_field('title_four');
                                    $text_four = get_sub_field('text_four'); ?>
                                    <div class="for-card four">
                                        <h3 class="for-card-subtitle"><?php echo $title_four; ?></h3>
                                        <p class="for-card-text"><?php echo $text_four; ?></p>
                                    </div>
                            <?php
                                endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section join">
            <div class="wrapper">
                <div class="wrap">
                    <div class="md-12">
                        <div class="join-banner">
                            <h1 class="join-title"><?php echo $join_title; ?></h1>
                            <p class="join-text"><?php echo $join_text; ?></p>
                            <?php if ($join_button) : ?>
                                <a class="primary-btn white" href="<?php echo esc_url($join_button['url']); ?>">
                                    <div class="btn-text">
                                        <?php echo esc_html($join_button['title']); ?>
                                    </div>
                                    <div class="btn-arrow">
                                        <img src="<?php echo $globalSite['theme_url'] . '/src/img/Button-arrow.svg'; ?>" />
                                    </div>
                                </a>
                            <?php endif; ?>
                            <img class="join-image" src="<?php echo $join_image; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section testimonials">
            <div class="wrapper">
                <div class="wrap">
                    <div class="md-12">
                        <h4 class="testimonials-subtitle"><?php echo $testimonials_subtitle; ?></h4>
                        <h1 class="testimonials-title"><?php echo $testimonials_title; ?></h1>
                    </div>
                    <div class="md-12">
                        <?php
                        if (have_rows('testimonials_item')) : ?>
                            <div class="testimonials-slider">
                                <?php while (have_rows('testimonials_item')) : the_row();
                                    $testimonials_title = get_sub_field('testimonials_title');
                                    $testimonials_text = get_sub_field('testimonials_text');
                                    $person_image = get_sub_field('person_image');
                                    $person_name = get_sub_field('person_name'); ?>


                                    <div class="testimonials-item">
                                        <?php
                                        if ($testimonials_title) : ?>
                                            <h2 class="testimonials-item-title">
                                                <?php
                                                echo $testimonials_title; ?>
                                            </h2>
                                        <?php
                                        endif;
                                        if ($testimonials_text) : ?>
                                            <p class="testimonials-item-text">
                                                <?php
                                                echo $testimonials_text; ?>
                                            </p>
                                        <?php
                                        endif;
                                        if ($person_image && $person_name) : ?>
                                            <div class="testimonials-person">
                                                <img class="testimonials-person-image" src="<?php echo esc_html($person_image['url']); ?>" />
                                                <div class="testimonials-person-name"><?php echo $person_name; ?></div>
                                            </div>
                                        <?php
                                        endif; ?>
                                    </div>
                                <?php
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section id="about_us" class="section video">
            <div class="video-wrap">
                <img class="video-icon" src="<?php echo $globalSite['theme_url'] . '/src/img/Video-icon.svg'; ?>" />
                <div class="wrapper-fluid">
                    <div class="wrap">
                        <div class="md-7">
                            <h1 class="video-title"><?php echo $video_title; ?></h1>
                        </div>
                        <div class="md-5">
                            <p class="video-text"><?php echo $video_text; ?></p>
                        </div>
                    </div>
                    <div class="wrap">
                        <div class="md-12">
                            <?php if ($video_choice) : ?>
                                <div class="media-container">
                                    <video controls poster="<?php echo $video_thumb; ?>">
                                        <?php
                                        if ($mp) echo '<source src="' . $mp . '" type="video/mp4">';
                                        if ($webm) echo '<source src="' . $webm . '" type="video/webm">';
                                        if ($ogg) echo '<source src="' . $ogg . '" type="video/ogg">'; ?>
                                    </video>
                                </div>
                            <?php else : ?>
                                <div class="embed-container">
                                    <?php echo $embed; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section join-two">
            <div class="wrapper">
                <div class="wrap">
                    <div class="md-6">
                        <h1 class="join-two-title"><?php echo $join_two_title; ?></h1>
                        <p class="join-two-text"><?php echo $join_two_text; ?></p>
                        <?php if ($join_two_button) : ?>
                            <a class="primary-btn" href="<?php echo esc_url($join_two_button['url']); ?>">
                                <div class="btn-text">
                                    <?php echo esc_html($join_two_button['title']); ?>
                                </div>
                                <div class="btn-arrow">
                                    <img src="<?php echo $globalSite['theme_url'] . '/src/img/Button-arrow-white.svg'; ?>" />
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="md-6">
                        <img class="join-two-image" src="<?php echo $join_two_image; ?>" />
                        <div class="join-two-circles">
                            <div class="join-two-circle one"></div>
                            <div></div>
                            <div></div>
                            <div class="join-two-circle two"></div>
                            <div class="join-two-circle three"></div>
                            <div></div>
                            <div></div>
                            <div class="join-two-circle four"></div>
                            <div class="join-two-circle five"></div>
                            <div></div>
                            <div class="join-two-circle six"></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php
get_footer();
