/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import '../css/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

window.addEventListener("load", function() {

// Get all dropdowns on the page that aren't hoverable.
    const dropdowns = document.querySelectorAll('.dropdown:not(.is-hoverable)');

    if (dropdowns.length > 0) {
        // For each dropdown, add event handler to open on click.
        dropdowns.forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.stopPropagation();
                el.classList.toggle('is-active');
            });
        });

        // If user clicks outside dropdown, close it.
        document.addEventListener('click', function (e) {
            closeDropdowns();
        });
    }

    /*
     * Close dropdowns by removing `is-active` class.
     */
    function closeDropdowns() {
        dropdowns.forEach(function (el) {
            el.classList.remove('is-active');
        });
    }

// Close dropdowns if ESC pressed
    document.addEventListener('keydown', function (event) {
        let e = event || window.event;
        if (e.key === 'Esc' || e.key === 'Escape') {
            closeDropdowns();
        }
    });

});

window.setTimeout("document.getElementById('message').style.display='none';", 2000);

