<?php
// Variables ACF
$domaine_title = get_field('domaine_title');
$domaine_description = get_field('domaine_description');
?>
<!-- Section Domaine -->
<section class="domaine py-5">
    <div class="container text-center">
        <?php if ($domaine_title): ?>
            <h2><?php echo esc_html($domaine_title); ?></h2>
        <?php endif; ?>

        <?php if ($domaine_description): ?>
            <p><?php echo esc_html($domaine_description); ?></p>
        <?php endif; ?>
    </div>
</section>
