//___ Owl-carousel 1 ___//
$('.carousel-1').owlCarousel({
    loop:true,
    nav:false,
    margin:0,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


//___ Owl-carousel 2 ___//
$('.carousel-2').owlCarousel({
    loop:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsive:{
        0:{items:2},650:{items:3},950:{items:4},1200:{items:3},1500:{items:5}
    }
})


//___ Owl-carousel 3 ___//
$('.carousel-3, .carousel-4').owlCarousel({
    loop:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    responsive:{
        0:{items:2},900:{items:3}
    }
})