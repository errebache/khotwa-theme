<?php
// Variables ACF
$faqs = get_field('faqs'); // Repeater avec 'question' et 'answer'
?>
<!-- Section FAQ -->
<?php if( have_rows('faqs') ): ?>
    <section class="faq py-5">
        <div class="container">
            <div class="accordion" id="faqAccordion">
                <?php $i = 0; while( have_rows('faqs') ): the_row(); $i++; ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-<?php echo $i; ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $i; ?>">
                                <?php the_sub_field('question'); ?>
                            </button>
                        </h2>
                        <div id="collapse-<?php echo $i; ?>" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php the_sub_field('answer'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
