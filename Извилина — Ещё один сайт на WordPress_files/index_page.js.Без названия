        function Marquee(selector, speed) {
            const parentSelector = document.querySelector(selector);
            const clone = parentSelector.innerHTML;
            const firstElement = parentSelector.children[0];
            let i = 0;
            console.log(firstElement);
            parentSelector.insertAdjacentHTML('beforeend', clone);
            parentSelector.insertAdjacentHTML('beforeend', clone);
            parentSelector.insertAdjacentHTML('beforeend', clone);
            parentSelector.insertAdjacentHTML('beforeend', clone);

            setInterval(function () {
                firstElement.style.marginLeft = `-${i}px`;
                if (i > firstElement.clientWidth * 4) {
                i = 0;
                }
                i = i + speed;
            }, 0);
        }

     
        window.addEventListener('load', Marquee('.marquee', 0.2))
        document.documentElement.clientWidth > 840 ?
            document.querySelector('.h1-grid_item__button_').appendChild(document.querySelector('.main_page_bnt_icon'))
            : 
            ''

        document.documentElement.clientWidth < 600 ?
            // document.querySelector('.video_block-text').appendChild(document.querySelector('.video_block_youtube'))
            document.querySelector('.video_block_text').insertBefore(document.querySelector('.video_block_youtube'),document.querySelector('.video_block-text'))
            : 
            ''

            
        // document.querySelector('.parallax_block_bacHover').addEventListener("mousemove", parallax);

        // document.querySelector('#masthead').addEventListener("mousemove", (event)=>{
        //     document.querySelector('.parallax_block').querySelectorAll(".mouse").forEach((shift) => {
        //     const position = shift.getAttribute("value");
        //     const x = (window.innerWidth - event.pageX * position) / 99;
        //     const y = (window.innerHeight - event.pageY * position) / 99;
    
        //     shift.style.transform = `translateX(${x}px) translateY(${y}px)`;
        //     });
        // });

        // function parallax(event) {
        //     this.querySelectorAll(".mouse").forEach((shift) => {
        //     const position = shift.getAttribute("value");
        //     const x = (window.innerWidth - event.pageX * position) / 99;
        //     const y = (window.innerHeight - event.pageY * position) / 99;
    
        //     shift.style.transform = `translateX(${x}px) translateY(${y}px)`;
        //     });
        // }


















        if (document.querySelector('.what_we_cando-slider')){
        let whatCanWeDo = tns({
            container: '.what_we_cando-slider',
            items: 1,
            autoplay: true,
            speed: 400,
            mouseDrag: true,
            loop: true,
             nav:false, 
            freezable: false,
            controlsContainer:'.what_we_cando-slider-nav',
            nextButton:'.what_we_cando-slider-nav_left',
            prevButton: '.what_we_cando-slider-nav_right',
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
        // document.querySelector('.what_we_cando-slider-nav').style.top =  document.querySelector('.done_works-img').offsetHeight   / 2 + 'px';
    }

   

    // Костылина для слайдера на главной "ЧТО МЫ УМЕЕМ" НАЧАЛО
    // let resizeKostyl = () =>{
   
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[0].classList.remove('scale_08')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[0].classList.remove('scale_1')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[6].classList.remove('scale_08')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[6].classList.remove('scale_1')

        
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[0].classList.add('scale_06')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[4].classList.add('scale_06')


    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[1].classList.remove('scale_06')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[1].classList.remove('scale_1')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[5].classList.remove('scale_06')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[5].classList.remove('scale_1')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[1].classList.add('scale_08')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[5].classList.add('scale_08')

    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[4].classList.remove('scale_06')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[4].classList.remove('scale_08')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[4].classList.add('scale_1')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[3].classList.remove('scale_06')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[3].classList.remove('scale_08')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[3].classList.add('scale_1')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[2].classList.remove('scale_06')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[2].classList.remove('scale_08')
    //     document.querySelectorAll('.what_we_cando-item.tns-slide-active')[2].classList.add('scale_1')


    // }

    // resizeKostyl()  

    // let resizeSliderItem = function (info, eventName) {

    //     resizeKostyl()
        
    // }

    // // bind function to event
    // whatCanWeDo.events.on('indexChanged', resizeSliderItem);
    // Костылина для слайдера на главной "ЧТО МЫ УМЕЕМ" КОНЕЦ



    let youtube = document.querySelectorAll("body .youtube");
    if (youtube.length){
        for (var i = 0; i < youtube.length; i++) {
            youtube[i].addEventListener("click", function () {
                let iframe = document.createElement("iframe");
                iframe.setAttribute("frameborder", "0");
                iframe.setAttribute("width", "350");
                iframe.setAttribute("height", "197");
                iframe.setAttribute("allowfullscreen", "");
                iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.embed +
                    "?rel=0&showinfo=0&autoplay=1");
                this.innerHTML = "";
                this.appendChild(iframe);
            });
        };
    }
