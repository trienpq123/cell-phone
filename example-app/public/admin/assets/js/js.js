function validator(status,data){
    $('.name-error, .slug-error, .desc-error, .desc-short-error').removeClass('active')
    if(status == 404){
        if(data.name){
            $('.name-error').addClass('active');
            $('.name-error').html(data.name);
            
        }
        if(data.image){
            $('.image-error').addClass('active');
            $('.image-error').html(data.image);
        }
        if(data.slug){
            $('.slug-error').addClass('active');
            $('.slug-error').html(data.slug);
        }
        if(data.name_category){
            $('.name-error').addClass('active')
        }
    }
}
