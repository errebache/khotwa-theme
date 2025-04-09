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

    // video modal
    $(document).on('click', '.video-trigger', function (e) {
        e.preventDefault();
        const videoURL = $(this).data('video-url');
        if (videoURL) {
          $('#globalVideoFrame').attr('src', videoURL + '?autoplay=1');
        }
      });

      $(document).on('click', '.play-icon', function (e) {
        e.preventDefault();
        const videoURL = $(this).data('video-url');
        if (videoURL) {
          $('#globalVideoFrame').attr('src', videoURL + '?autoplay=1');
        }
      });
    
      $('#videoModal').on('hidden.bs.modal', function () {
        $('#globalVideoFrame').attr('src', '');
      });


      // select language 
      const $toggle = $('.language-toggle');
      const $dropdown = $('.language-dropdown-list');
      const $wrapper = $('.language-dropdown-wrapper');

      // Toggle au clic
      $toggle.on('click', function (e) {
          e.stopPropagation();
          $dropdown.toggleClass('show');
      });

      // Hover pour desktop
      $wrapper.on('mouseenter', function () {
          $dropdown.addClass('show');
      });

      $wrapper.on('mouseleave', function () {
          $dropdown.removeClass('show');
      });

      // Fermer au clic à l'extérieur
      $(document).on('click', function (e) {
          if (!$(e.target).closest('.language-dropdown-wrapper').length) {
              $dropdown.removeClass('show');
          }
      });
});
