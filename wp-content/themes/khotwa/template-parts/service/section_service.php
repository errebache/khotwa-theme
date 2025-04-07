<?php
// Récupération des champs ACF pour la bannière principale
// $bg_image = get_field('background_image');
$libele = get_field('test_libelle_du_champ');
$img_service = get_field('imglibelle');
$imgServ = is_array($img_service) && isset($img_service['url']) ? esc_url($img_service['url']) : esc_url($img_service);

?>

<!-- Section Bannière -->
<?php if ($libele || $img_service): ?>
    <section class="service py-5 text-center text-white">
        <div class="container">
            <div class="row align-items-center">
              
            <p style="color: red;"><?php echo $libele ?></p>
             <img src="<?php echo $imgServ; ?>" alt="service image" class="img-fluid">
            </div>
        </div>
    </section>
<?php endif; ?>
