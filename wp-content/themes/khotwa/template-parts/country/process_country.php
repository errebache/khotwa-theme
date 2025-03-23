<?php
// Variables ACF
$process = get_field('process'); // Repeater avec 'step_number', 'step_title', 'step_description'
?>
<!-- Section Process -->
<?php if( have_rows('process') ): ?>
    <section class="process py-5 text-center">
        <div class="container">
            <div class="row">
                <?php while( have_rows('process') ): the_row(); ?>
                    <div class="col-md-4">
                        <div class="process-step">
                            <h3><?php the_sub_field('step_number'); ?></h3>
                            <h4><?php the_sub_field('step_title'); ?></h4>
                            <p><?php the_sub_field('step_description'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
