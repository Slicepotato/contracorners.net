jQuery(document).ready(function($){ 
    $('.menu-item').on('click', 'a', function() {
        $(this).next('.sub-menu').toggleClass('show');
    });
});
