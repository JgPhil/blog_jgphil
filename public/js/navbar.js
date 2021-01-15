$(document).on('scroll', function (e) {
$('nav').toggleClass('scrolled', ($(this).scrollTop() > 150));
});