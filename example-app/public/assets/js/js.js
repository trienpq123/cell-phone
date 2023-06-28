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
            $(this).parents('.list-filter-child.active').find('.btn-filter-group').addClass('active');
            $(this).parents('.filter-item').find('button').addClass('active');
            $('.option-filter .list-filting').show();
        }else{
            $(this).parents('.list-filter-child.active').find('.btn-filter-group').removeClass('active')
            $(this).parents('.filter-item').find('button').removeClass('active');
            $('.option-filter .list-filting').hide();
        }
    })

    $('body').on('click','.list-filter-child.active .btn-filter-group.active .btn.btn-filter-result',function(){
        let liActive = $(this).parents('.filter-item').find('ul li');
        let getListFilting = $('.list-filting ul.list-filter li');
        console.log(getListFilting)
        let li  = '';

        for (let i = 0; i < liActive.length; i++) {
            if(liActive[i].classList.contains('active')){
                let filter_id =  liActive[i].getAttribute('data-id');
                let filter_name = liActive[i].getAttribute('data-name')
                let array = [];
                for (let j = 0; j < getListFilting.length; j++) {
                    array.push(getListFilting[j].getAttribute('data-id'));
                }
                if($.inArray(filter_id,array) <=0){
                    li+= `<li  data-id=${filter_id}>
                    <button data-id=${filter_id} ><span class="fas fa-close"></span> <span class="innter_filter">${filter_name}</span></button>
                    </li>`
                }

                // var data = {
                //     name: 'John',
                //     age: 30,
                //     city: 'Hanoi'
                //   };

                //   var queryString = $.param(data);

                //   console.log(queryString);
                const urlParams = window.location.href;
                console.log(urlParams)
            }else{
                for (let j = 0; j < getListFilting.length; j++) {
                   let Filting_id = getListFilting[j].getAttribute('data-id');
                   let filter_id = liActive[i].getAttribute('data-id');
                   console.log(Filting_id,filter_id)
                   if(Filting_id == filter_id){
                    getListFilting[j].remove();
                   }
                }
            }


        }
        $('.list-filting .list-filter').append(li);
        $(this).parents('.list-filter-child.active').removeClass('active')
    })

    $('body').on('click','.list-filter-child.active .btn-filter-group.active .btn.btn-filter-close',function(){
        $(this).parents('.list-filter-child').removeClass('active');
    })

    $('body').on('click','.list-filting ul.list-filter li','click',function(){
        console.log($(this));
        let filting_id = $(this).attr('data-id');

        $(this).remove();
    })

    $('body').on('click','.delete-all',function(){
        $('.option-filter .list-filting').hide();
    })
})
