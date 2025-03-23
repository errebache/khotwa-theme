<?php
// Variables ACF
$brands = get_field('brands'); // Repeater avec 'brand_logo'
?>
<!-- Section Brands -->
<?php if( have_rows('brands') ): ?>
    <section class="brands py-5 text-center">
        <div class="container">
            <div class="row justify-content-center">
                <?php while( have_rows('brands') ): the_row();
                    $brand_logo = get_sub_field('brand_logo');
                    $brand_logo_url = is_array($brand_logo) ? esc_url($brand_logo['url']) : esc_url($brand_logo);
                    ?>
                    <div class="col-4 col-md-2 mb-4">
                        <img src="<?php echo $brand_logo_url; ?>" alt="Brand" class="img-fluid">
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
