<?php
// Variables ACF
$why_choose_title = get_field('why_choose_title');
$why_choose_points = get_field('why_choose_points'); // Repeater avec 'point'
?>
<!-- Section Why Choose -->
<section class="why-choose py-5">
    <div class="container text-center">
        <?php if ($why_choose_title): ?>
            <h2><?php echo esc_html($why_choose_title); ?></h2>
        <?php endif; ?>

        <?php if( have_rows('why_choose_points') ): ?>
            <ul class="list-unstyled">
                <?php while( have_rows('why_choose_points') ): the_row(); ?>
                    <li><?php the_sub_field('point'); ?></li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>
