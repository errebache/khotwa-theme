// custom.js

// Exécuter ce code après que la page soit entièrement chargée
document.addEventListener('DOMContentLoaded', () => {
    console.log('Le thème Khotwa est bien chargé !');

    // Exemple : Animation simple sur le bouton personnalisé
    const buttons = document.querySelectorAll('.btn-custom');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Bouton personnalisé cliqué !');
        });
    });
});
