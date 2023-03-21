jQuery(document).ready(function($){ 
    let detailsBox = document.getElementById('details-box');

    document.addEventListener('mouseover', function (e) {
    if (e.target.tagName == 'path') {
        let content = e.target.dataset.name;
        detailsBox.innerHTML = content;
        detailsBox.classList.add('show');
    }
    else {
        detailsBox.classList.remove('show');
    }
    });

    window.onmousemove = function (e) {
    let x = e.clientX,
        y = e.clientY;
        detailsBox.style.top = (y + 20) + 'px';
        detailsBox.style.left = (x) + 'px';
    }; 

    $('#state_select').on('change', function () {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });
});
