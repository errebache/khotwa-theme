<?php
// Variables ACF
$statistics = get_field('statistics'); // Repeater avec 'number', 'label'
?>
<!-- Section Statistics -->
<?php if( have_rows('statistics') ): ?>
    <section class="statistics py-5 text-center">
        <div class="container">
            <div class="row">
                <?php while( have_rows('statistics') ): the_row(); ?>
                    <div class="col-md-3">
                        <div class="statistic-item">
                            <h2><?php the_sub_field('number'); ?></h2>
                            <p><?php the_sub_field('label'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
