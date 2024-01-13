//_____ Sidebar toggle start _____//
$(document).ready(()=> {
    $('.hamberger').on('click', ()=> {
        $('.hamberger').toggleClass('active');
        $('.sidebar').toggleClass('active');
        $('.main').toggleClass('active');
    })
})
//_____ Sidebar toggle end _____//