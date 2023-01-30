$(document).ready(function () {
    $("#changepass").click(function (event) {
        let pass = document.getElementById('New_Password').value;
        let oldpass = document.getElementById('Old_Password').value;
        let repass = document.getElementById('Re_Password').value;
        if (pass != repass) {
            document.getElementById('editpasscheck').innerHTML = "Please recheck your Password.";
            event.preventDefault();
        }
        if (pass == oldpass) {
            document.getElementById('editpasscheck').innerHTML = "Please enter a different Password.";
            event.preventDefault();
        }
    });
});

function YouTubeGetID(url) {
    var ID = '';
    url = url.replace(/(>|<)/gi, '').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
    if (url[2] !== undefined) {
        ID = url[2].split(/[^0-9a-z_\-]/i);
        ID = ID[0];
    }
    else {
        ID = 'Error: Cannot Find Id';
    }
    return ID;
}

//Dashboard sidebar toggle
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            // localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

//Scroll to top

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('#page-content-wrapper').animate({
            scrollTop: 0
        }, 400);
        return false;
    });
});