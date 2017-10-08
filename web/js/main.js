/**
 * Created by juliengrima on 13/08/2017.
 */
// ********************************************************************
// *                       Appel Fonction
// ********************************************************************
jQuery(document).ready(function($) {

    console.log('jQuery de app.js a démarré julien test');

    carousel();
    text();
    select();
    cal();

});

// ********************************************************************
// *                       JS General
// ********************************************************************

// ********************************************************************
// *                       Sliders
// ********************************************************************

function carousel() {
    $('.slider').slider({fullWidth: true});
}

// ********************************************************************
// *                       FORMS
// ********************************************************************

function text() {
    $('#textarea1').val('New Text', 'autoresize');
}

function select() {
    console.log('select')
    $('select').material_select();
}

// ********************************************************************
// *                       Calendar
// ********************************************************************

function cal() {
    $('#calendar').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        dayNamesMin: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam']
    });
}



