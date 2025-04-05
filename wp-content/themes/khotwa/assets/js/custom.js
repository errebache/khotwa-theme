$(document).ready(function() {
    const menuToggle = $('.menu-toggle');
    const closeMenu = $('#closeMenu');
    const navbarCollapse = $('.navbar-collapse');


    menuToggle.on('click', function(event) {
        event.stopPropagation();
        console.log("Menu burger cliqué");
        navbarCollapse.addClass('active'); 
    });


    closeMenu.on('click', function() {
        console.log("Bouton de fermeture cliqué");
        navbarCollapse.removeClass('active');
    });

    $(document).on('click', function(event) {
        if (
            !navbarCollapse.is(event.target) && 
            !menuToggle.is(event.target) &&  
            navbarCollapse.has(event.target).length === 0
        ) {
            console.log("Clic à l'extérieur détecté");
            navbarCollapse.removeClass('active');
        }
    });

    navbarCollapse.on('click', function(event) {
        event.stopPropagation();
    });
});
