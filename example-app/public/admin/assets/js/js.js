function validator(status,data){
    $('.name-error').removeClass('active')
    if(status == 404){
        if(data.name){
            $('.name-error').toggleClass('active')
        }
    }
}
