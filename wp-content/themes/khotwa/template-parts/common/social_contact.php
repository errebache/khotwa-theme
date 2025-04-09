<?php
// Vérification si ACF est installé
if (!function_exists('get_field')) return;

$footer_social_title = get_field('footer_social_title');
$footer_social_icons = get_field('footer_social_icons');
$footer_contact_title = get_field('footer_contact_title');
$footer_phone_fix_label = get_field('footer_phone_fix_label');
$footer_phone_fix_value = get_field('footer_phone_fix_value');
$footer_phone_mobile_label = get_field('footer_phone_mobile_label');
$footer_phone_mobile_value = get_field('footer_phone_mobile_value');
?>

<div class="col-md-4 mb-4">
       <div class="footer_social_title">
        <?php if ($footer_social_title): ?>
            <h6 class="mb-3 text-warning"><?php echo esc_html($footer_social_title); ?></h6>
            <?php endif; ?>
            <?php if ($footer_social_icons): ?>
            <div class="d-flex gap-3 fs-5">
                <?php foreach ($footer_social_icons as $icon):
                $icon_link = isset($icon['link']) ? esc_url($icon['link']) : '#';
                $social_icon = $icon['social_icon'];
                ?>
                <a href="<?php echo $icon_link; ?>" class="text-light" target="_blank">
                    <?php if ($social_icon): ?>
                      <span class="icon-rounded"><i class="bi bi-<?php echo $social_icon ?>"></i></span>
                    <?php endif; ?>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
       </div>
       <div class="footer_contact_title">
        <?php if ($footer_contact_title): ?>
            <h6 class="text-warning mb-3 mt-5"><?php echo esc_html($footer_contact_title); ?></h6>
            <?php endif; ?>
            <?php if ($footer_phone_fix_label && $footer_phone_fix_value): ?>
            <p class="mb-1"><span class=" phone_label"><?php echo esc_html($footer_phone_fix_label); ?></span> <span class="phone_value"><?php echo esc_html($footer_phone_fix_value); ?></span></p>
            <?php endif; ?>
            <?php if ($footer_phone_mobile_label && $footer_phone_mobile_value): ?>
            <p> <span class="phone_label"><?php echo esc_html($footer_phone_mobile_label); ?> </span> <span class="phone_value"><?php echo esc_html($footer_phone_mobile_value); ?></span></p>
            <?php endif; ?>
       </div>
      </div>