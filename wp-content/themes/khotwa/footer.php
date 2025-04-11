</main>
<?php
// Vérification si ACF est installé
if (!function_exists('get_field')) return;

// Gestion de la direction RTL / LTR
$is_rtl = is_rtl();
$current_language = substr(get_locale(), 0, 2);
$direction_class = ($is_rtl && $current_language === 'ar') ? 'rtl' : 'ltr';
$flex_row_class = ($is_rtl && $current_language === 'ar') ? 'flex-row-reverse' : '';

// === Champs généraux ===
$footer_map_iframe = get_field('footer_map_iframe');

$footer_address_title = get_field('footer_address_title');
$footer_address_text = get_field('footer_address_text');
$footer_hours_title = get_field('footer_hours_title');
$footer_hours_weekdays = get_field('footer_hours_weekdays');
$footer_hours_saturday = get_field('footer_hours_saturday');
$default_footer_background =  get_field('footer_hours_saturday');

// === Champs visuels ===
$default_footer_background = get_field('default_footer_background');
$footer_select_color = get_field('footer_select_color'); // 'footer_red' ou 'footer_blue'

// === valeurs statiques en cas de fond par défaut ===
$static_red_bg     = get_template_directory_uri() . '/assets/img/footer-red.png';
$static_blue_bg    = get_template_directory_uri() . '/assets/img/footer-blue.png';
$static_plane_red  = get_template_directory_uri() . '/assets/img/plane-red.png';
$static_plane_blue = get_template_directory_uri() . '/assets/img/plane-blue.png';
$static_plane_mobile_red = get_template_directory_uri() . '/assets/img/plane-red-mobile.png';
$static_plane_mobile_blue = get_template_directory_uri() . '/assets/img/plane-red-mobile.png';

// === fallback si fond personnalisé (ACF)
$footer_bg_color = get_field('footer_bg_color');
$footer_image    = get_field('footer_image');
$footer_image_mobile    = get_field('footer_image_mobile');

$footer_bg = '';
$plane_img = '';
$plane_img_mobile = '';
$plane_class = '';

// === LOGIQUE PRINCIPALE
if ($default_footer_background) {
    if ($footer_select_color === 'footer_red') {
        $footer_bg = $static_red_bg;
        $plane_img = $static_plane_red;
        $plane_img_mobile = $static_plane_mobile_red;
        $plane_class = 'plane-red';
    } elseif ($footer_select_color === 'footer_blue') {
        $footer_bg = $static_blue_bg;
        $plane_img = $static_plane_blue;
        $plane_class = 'plane-blue';
        $plane_img_mobile = $static_plane_mobile_blue;
    }
} else {
    $footer_bg = is_array($footer_bg_color) && isset($footer_bg_color['url']) ? esc_url($footer_bg_color['url']) : esc_url($footer_bg_color);
    $plane_img = is_array($footer_image) && isset($footer_image['url']) ? esc_url($footer_image['url']) : esc_url($footer_image);
    $plane_img_mobile = is_array($footer_image_mobile) && isset($footer_image_mobile['url']) ? esc_url($footer_image_mobile['url']) : esc_url($footer_image_mobile);
    $plane_class = 'plane-custom';
}

?>
<style>
    .footer {
        background-image: url('<?php echo $footer_bg; ?>');
        color: #fff;
    }
    .plane {
        background-image: url('<?php echo $plane_img; ?>');
    }
    @media (max-width: 768px) {
      .footer .plane {
        background-image: url('<?php echo $plane_img_mobile; ?>');
      }
    }
</style>

<footer class="footer pt-5">
   <div class="footer-top">
   <div class="container">
    <div class="row">
      <!-- Bloc adresse et horaires -->
      <div class="col-md-4 mb-4">
        <div class="footer_address_title">
          <?php if ($footer_address_title): ?>
            <h6 class="mb-3 text-warning"><?php echo esc_html($footer_address_title); ?></h6>
          <?php endif; ?>
          <?php if ($footer_address_text): ?>
            <p><?php echo esc_html($footer_address_text); ?></p>
          <?php endif; ?>
        </div>
        <div class="footer_hours_title">
          <?php if ($footer_hours_title): ?>
            <h6 class="text-warning mb-3 mt-5"><?php echo esc_html($footer_hours_title); ?></h6>
          <?php endif; ?>
          <?php if ($footer_hours_weekdays): ?>
            <p><?php echo esc_html($footer_hours_weekdays); ?></p>
          <?php endif; ?>
          <?php if ($footer_hours_saturday): ?>
            <p><?php echo esc_html($footer_hours_saturday); ?></p>
          <?php endif; ?>
        </div>  
      </div>

      <!-- Bloc réseaux sociaux et téléphone -->
      <?php get_template_part('template-parts/common/social_contact'); ?>

      <!-- Bloc carte Google Maps -->
      <div class="col-md-4 mb-4">
        <div class="map-embed">
          <?php
          echo '<iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.293497037386!2d-6.844161484800307!3d33.99871838061773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda76c84a5a6d2d1%3A0x6fb51a20cb368b1d!2s27%20Rue%20Oued%20Moulouya%2C%20Rabat!5e0!3m2!1sfr!2sma!4v1612181195709!5m2!1sfr!2sma" 
            width="100%" 
            height="250" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
          </iframe>';
          ?>
        </div>
      </div>

    </div>
  </div>
   </div>
  <div class="plane"></div>
  <?php get_template_part('template-parts/common/modal'); ?>
</footer>
</div>
<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
