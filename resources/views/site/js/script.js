$(function() {
    $('h1').animate({opacity: '1'}, 'slow')
    setInterval(function() {
        $('h2').animate({opacity: '1'}, 'slow')
    }, 500)
    setInterval(function() {
        $('.card').animate({opacity: '1'}, 'slow')
    }, 1000)
})