const overlay = document.querySelector('.overlay');
let burger = document.querySelector('.menu-burger'),
    mobMenu = document.querySelector('.pc_menu'),
    doc = document.querySelector('body');

const openModal = (name = '') => {
        if (name) {
            document.querySelector(`.modal_wrapper .${name}`).classList.add('active')
        }
        overlay.classList.add('active')
        document.querySelector('body').classList.add('no_overlay')
        document.querySelector('html').classList.add('no_overlay')
        document.querySelector('.modal_wrapper').classList.add('active')
    }
const closeModals = () => {
    if (document.querySelector('.modal_wrapper .form_block.active')) {
        document.querySelector('.modal_wrapper .form_block.active').classList.remove('active')
    }
    overlay.classList.remove('active')
    document.querySelector('body').classList.remove('no_overlay')
    document.querySelector('html').classList.remove('no_overlay')
    document.querySelector('.modal_wrapper').classList.remove('active')
}


//async load css
function asyncCSS(href) {
    var css = document.createElement('link');
    css.rel = "stylesheet";
    css.href = href;
    document.head.appendChild(css);
}

//async load js
function asyncJs(src) {
var js = document.createElement("script");
    js.type = "text/javascript";
    js.async = true;
    js.src = src;
    document.head.appendChild(js);
}

     
    let mapIframeIsLoaded = false;
    const loadMapIframe = (src) => {
        var iframe = document.createElement('iframe');
        iframe.style.width = '1280px';
        iframe.style.height = '659px';
        iframe.src = src;
        document.querySelector('.map_modal').appendChild(iframe);
        mapIframeIsLoaded = true
    }

    // открываем карту
    document.querySelectorAll('.open_map').forEach((mapBtn, index) => {
        mapBtn.addEventListener('click', () => {
            openModal()
            console.log(mapBtn.dataset.src);
            !mapIframeIsLoaded ? loadMapIframe(mapBtn.dataset.src) : '';

        })
    });
    overlay.addEventListener('click', () => {
        closeModals()
        mobMenu.classList.remove('active')
        burger.classList.remove('active')
        doc.classList.remove('fixed')
    })

// if (document.querySelector('.reviews')){//прыжки фоток решили зафризить

//     document.querySelector('.reviews').addEventListener("mousemove", (event)=>{ //для сердечек
//         document.querySelector('.reviews').querySelectorAll(".mouse").forEach((shift) => {
//         const position = shift.getAttribute("value");
//         const x = (window.innerWidth - event.pageX * position) / 99;
//         const y = (window.innerHeight/4 - event.pageY * position) / 99 *0.3;

//         shift.style.transform = `translateX(${x}px) translateY(${y}px)`;
//         });
//     });
// }

asyncCSS('/wp-content/themes/izvilina33/js/tiny_slider/tiny-slider.css');
// asyncJs('/wp-content/themes/izvilina33/js/tiny-slider.js');

    if (document.querySelector('.reviews_list')){
        let reviewsSlider = tns({
            container: '.reviews_list',
            items: 1,
            nav:false, 
            autoplay: true,
            speed: 400,
            center:true,
            mode: 'gallery',
            mouseDrag: true,
            loop: true,
            freezable: false,
            animateIn: 'rollOut',
            animateOut: 'rollOut',
            swipeAngle: false,
            controlsContainer:'.reviews-nav',
            nextButton:'.reviews-nav_left',
            prevButton: '.reviews-nav_right',
            responsive: {
                640: {
                    items: 1,
                },
                
                768: {
                    mouseDrag: false,

                    items: 1,
                }
            }
        });
    }


    
    if (document.querySelector('.done_works-slider')){
        let doneWorksSlider = tns({
            container: '.done_works-slider',
            items: 1,
            nav:false, 
            autoplay: true,
            speed: 400,
            mouseDrag: true,
            loop: true,
            freezable: false,
            controlsContainer:'.done_works-slider-nav',
            nextButton:'.done_works-slider-nav_left',
            prevButton: '.done_works-slider-nav_right',
            responsive: {
                0: {
                    items: 1,
                },
                
                830: {
                    items: 2,
                },
                
                1250: {
                    items: 3,
                }
            }
        });
        document.querySelector('.done_works-slider-nav').style.top =  document.querySelector('.done_works-img').offsetHeight   / 2 + 'px';
    }


    // const menuStateController =(setState)=>{
    //     burger.setState('active')
    //     mobMenu.setState('active')
    //     overlay.setState('active')
    //     doc.setState('fixed')
    // }



    burger.addEventListener('click',()=>{
        burger.classList.add('active')
        mobMenu.classList.add('active')
        overlay.classList.add('active')
        doc.classList.add('fixed')
        // menuStateController('add')
    })
    document.querySelector('.close-menu').addEventListener('click',()=>{
        burger.classList.remove('active')
        mobMenu.classList.remove('active')
        overlay.classList.remove('active')
        doc.classList.remove('fixed')

    })