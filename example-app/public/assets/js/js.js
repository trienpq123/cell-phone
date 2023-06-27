$(document).ready(function(){
    $('.filter-item button').click(function(){
        $('.list-filter-child').removeClass('active');
       let show_filter =  $(this).parent('.filter-item').find('.list-filter-child');
        console.log(show_filter)
       show_filter.addClass('active');
    })

    $('.filter-item .list-filter-child ul li').click(function(){
        $(this).toggleClass('active');
        // console.log($(this).parents('.list-filter-child.active ul li').length)
        let checkActiveFilter =  $(this).parent('ul').find('li.active').length;
        if(checkActiveFilter > 0){
            $(this).parents('.list-filter-child.active').find('.btn-filter-group').addClass('active')
        }else{
            $(this).parents('.list-filter-child.active').find('.btn-filter-group').removeClass('active')
        }

    })
})
