<?php
// Variables ACF
$image = get_field('image');
$text = get_field('text');
$image_url = is_array($image) ? esc_url($image['url']) : esc_url($image);
?>
<!-- Section Image Text -->
<section class="image-text py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="<?php echo $image_url; ?>" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p><?php echo esc_html($text); ?></p>
            </div>
        </div>
    </div>
</section>
