<?php

/**
 * Hero Block Template.
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
// $id = 'testimonial-' . $block['id'];
// if( !empty($block['anchor']) ) {
//     $id = $block['anchor'];
// }

// Create class attribute allowing for custom "className" and "align" values.
// $className = 'testimonial';
// if( !empty($block['className']) ) {
//     $className .= ' ' . $block['className'];
// }
// if (!empty($block['align'])) {
//   $className .= ' align' . $block['align'];
// }

// Load values and assign defaults.
$title = get_field('title');
$text = get_field('text');
$list = get_field('list');
//
$btn1_txt = get_field('button1_text');
$btn1_url = get_field('button1_url');
//
$btn2_txt = get_field('button2_text');
$btn2_url = get_field('button2_url');
//
$vid = get_field('video');
$vid_safari = get_field('video_safari');
//
$bg = get_field('background');
$logo = get_field('logo');
//
$bgf = get_field('background_full');
?>

<!-- HTML template  -->
<div class="hero section-pri <?php if ($bgf) echo 'full' ?>" <?php if ($bg) echo 'style="background-color:rgba(201, 233, 253, 1)"'  ?> <?php if ($bgf) echo 'style="background-image:url(' . $bgf . ')"' ?>>

  <div class="container">

    <div class="hero-wrap">
      <h1 class="hero-title title-h1">
        <?= $title ?>
      </h1>
      <?php if ($text) : ?>
        <div class="hero-txt">
          <?= $text ?>
        </div>
      <?php endif; ?>

      <ul class="hero-list">
        <?php foreach ($list as $key => $value) :
          $txt = $value['text'];
          $icon = $value['icon'];
        ?>
          <li> <img src="<?= $icon; ?>" alt="" /> <?= $txt; ?></li>
        <?php endforeach; ?>
      </ul>


      <?php if ($btn1_txt) : ?>
        <a href="<?= $btn1_url; ?>" class="btn-pri"><?= $btn1_txt; ?></a>
      <?php endif; ?>

      <?php if ($btn2_txt) : ?>
        <a href="<?= $btn2_url; ?>" class="btn-link"><?= $btn2_txt; ?></a>
      <?php endif; ?>

    </div>
  </div>

  <?php if ($vid) :
    function get_browser_name($user_agent)
    {
      if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return true;
      elseif (strpos($user_agent, 'Edge')) return true;
      elseif (strpos($user_agent, 'Chrome')) return true;
      elseif (strpos($user_agent, 'Safari')) return false;
      elseif (strpos($user_agent, 'Firefox')) return true;
      elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return true;

      return true;
    }
    $check_vid = get_browser_name($_SERVER['HTTP_USER_AGENT']);

  ?>
    <video class="hero-video" src=" <?php if ($check_vid) echo $vid;
                                    else echo $vid_safari;   ?> " muted loop autoplay playsinline></video>
  <?php endif; ?>

  <div class="hero-background">
    <?php if ($bg) : ?>
      <img class="background" src="<?= $bg; ?>" alt="" />
    <?php endif; ?>

    <?php if ($logo) : ?>
      <div class="logo">
        <img src="<?php echo ASSETS . '/images/hero-lg-1.png'; ?>" alt="" />
        X
        <img src="<?= $logo; ?>" alt="" />
      </div>
    <?php endif; ?>
  </div>

  <div>
    <div class="decor-box"></div>
  </div>
</div>