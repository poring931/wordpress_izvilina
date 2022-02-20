let filter_input = document.querySelector('[name="cat_id"]'),
    filter_cats = [],
    filter_form = document.querySelector('#filter'),
    productList = document.querySelector(".inner_cats_list"),
    spinner = `<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>`,
    filterBtn = document.querySelectorAll('.category_item');

document.querySelectorAll('.category_item').forEach(category => {
   category.addEventListener('click', ()=>{
        // console.log(category.dataset.id);
        console.log(category.dataset.id);
        category.classList.toggle('active')
        // filter_cats.value += `${category.dataset.id}','`

        if (category.classList.contains('active')){
            filter_cats.push(category.dataset.id)
        } else {
            filter_cats = filter_cats.filter(function(value, index, arr){ 
                return value != category.dataset.id;
            });
        }
        console.log(filter_cats);//получаем набор выбранных элементов
        filter_input.value = filter_cats

        document.querySelector('.filter_btn').click() // отправляем фильтр на ажакс
        
   })
});


let offBtns = () =>{
    filterBtn.forEach((btn) => {
        btn.setAttribute("disabled", "")
    });
}
let onBtns = () =>{
    filterBtn.forEach((btn) => {
        btn.removeAttribute("disabled")
    });
}




// фильтрация по рубрикам. Какие косяки: когда сносишь рубрику, то будут выведены ВСЕ посты. Это плохо. надо как-то засинхронить кнопку показать еще и пагинацию. Сейчас типа выводится 8 товаров. Когда постов > 8, есть кнопка показать еще НО ТОЛЬКО ДЛЯ блога (основной категории), когда меняешь фильтр, все это я порчу. Не склеил. времени мало
filter_form && filter_form.addEventListener('submit',function(event) {
    event.preventDefault()

        let request = new XMLHttpRequest();
        request.open('POST', '/wp-admin/admin-ajax.php');
        let formData = new FormData(event.target);
        request.send(formData);
        request.addEventListener('readystatechange', function () {

            if (request.readyState == 4 && request.status == 200) {
                var res = request.responseText;

                setTimeout(function(){
                    productList.innerHTML = res;
                    onBtns()
                }, 250);

            } else {
                offBtns()
                 document.querySelector('.relative_block_') ? document.querySelector('.relative_block_').remove() : ''
                productList.innerHTML = spinner;
            }
        })
})


//показать еще
let getMorePostst = document.querySelector('.cats_list_getmore'),
    getMorePoststHtml = getMorePostst.innerHTML;
getMorePostst.addEventListener('click', ()=>{
        let request = new XMLHttpRequest();
        request.open('POST', '/wp-admin/admin-ajax.php');
       
        let data = {
            'action': 'loadmore',
            'query': posts_vars,
            'page' : current_page
        };

        let formData = new FormData();

        for ( let key in data ) {
            formData.append(key, data[key]);
        }

        request.send(formData);

        request.addEventListener('readystatechange', function () {

            if (request.readyState == 4 && request.status == 200) {
                let res = request.responseText;

                current_page++; // записываем новый номер страницы
                if (current_page == max_pages) document.querySelector('.relative_block_').remove();

                setTimeout(function(){
                    productList.insertAdjacentHTML('beforeend', res);
                    getMorePostst.innerHTML = getMorePoststHtml;
                }, 250);

            } else {
                getMorePostst.innerHTML = spinner;
            }
        })
})