<style>
    .skidka-cont {
        padding: 0 100px;
    }

    .skidka {
        width: 100%;
        background: #2B2A29;
        box-shadow: 0px 4px 4px rgba(43, 42, 41, 0.25);
        border-radius: 20px;
        padding: 60px 58px 60px 47px;
    }

    .skidka__ten,
    .skidka__text,
    .skidka__form {
        display: flex;
        flex-direction: row;
    }

    .skidka {
        display: flex;
        flex-direction: column;
        gap: 51px;
    }

    .skidka__text {
        gap: 47px;
    }

    .skidka__dtext {
        font-weight: bold;
        font-size: 60px;
        line-height: 106.11%;
        letter-spacing: 0.035em;
        text-transform: uppercase;
    }

    .skidka__podpiska-text,
    .skidka__ten {
        align-items: center;
    }

    .skidka__ten {
        gap: 6px;
    }

    .skidka__podpiska-text {
        font-weight: bold;
        font-size: 30px;
        line-height: 35px;
        color: #FFFFFF;
        opacity: 0.8;
    }

    .skidka__input {
        background: #FFFFFF;
        font-family: 'trebuchetms';
        border: 1px solid #FFFFFF;
        box-sizing: border-box;
        border-radius: 20px;
        width: 100%;
        display: flex;
        align-items: baseline;
        font-size: 20px;
        padding-left: 31.3px;
        outline: none;
        height: 100%;
    }

    .skidka__input::placeholder {
        font-family: 'trebuchetms';
        font-size: 20px;
        line-height: 100%;
        color: rgba(0, 0, 0, 0.5);
        opacity: 0.6;
    }

    .skidka__form {
        width: 100%;
        gap: 86px;
        padding-left: 13px;
    }

    a.skidka__submit {
        min-width: 266px;
        font-size: 20px;
        line-height: 23px;
        text-align: center;
        color: #FFFFFF;
    }

    .skidka__submit span {
        display: block;
        width: 100%;
        text-align: center;
    }

    .skidka__vvod {
        width: 100%;
        height: 65px;
        position: relative;
    }

    .skidka__vvod .skidka__input {
        padding: 21px 32px;
        opacity: 1;
        overflow: hidden;
        transition: 0.2s all ease;
    }

    .skidka__vvod.error .skidka__input {
        color: #E33232;
    }

    .skidka__vvod.error .skidka__input::placeholder {
        transform: translateY(-14px);
        color: #E33232;

        opacity: 1;
    }

    .skidka__placeholder {
        position: absolute;
        top: 70%;
        left: 32px;
        color: black;
        font-size: 10px;
        opacity: 0;
        transition: 0.2s all ease;
        pointer-events: none;
        cursor: unset;
    }

    .skidka__vvod.error .skidka__placeholder {
        display: block;
        color: #E33232;
        opacity: 1;
    }

    @media (max-width:1300px) {
        .skidka-cont {
            padding: 0;
        }

        .skidka__dtext {
            font-size: 49px;

        }

        .skidka__podpiska-text {
            font-size: 23px;
        }

        .skidka__form {
            padding-left: 0;
        }
    }

    @media (max-width:850px) {
        .skidka {

            padding: 50px 30px;
        }

        .skidka__text {
            gap: 15px;
            display: grid;
        }

        .skidka__podpiska-text br {
            display: none;
        }

        .skidka__form {
            gap: 30px;
        }
    }

    @media (max-width:650px) {
        .skidka__form {
            gap: 30px;
            display: grid;
            justify-items: center;
        }
    }

    @media (max-width:560px) {
        .skidka__ten {
            gap: 6px;
            display: grid;
        }

        .skidka__dtext {
            font-size: 10vw;
        }

        .skidka {
            padding: 30px 15px;
            gap: 24px;

        }

        .skidka_container {
            margin: 45px -25px;
        }

        .skidka {
            border-radius: 0;

        }
    }
</style>
<div class="section_block  skidka_container">
    <div class="skidka-cont">
        <div class="skidka">
            <div class="skidka__text">
                <div class="skidka__ten">
                    <img width="147" height="69" src="/wp-content/themes/izvilina33/images/icons/flames.png" alt="" class="skidka__img">
                    <p class="skidka__dtext">СКИДКА 10%</p>
                </div>
                <p class="skidka__podpiska-text">за подписку <br>на нашу рассылку</p>
            </div>
            <form action="" class="skidka__form" name="Подписка на рассылку" onsubmit="return false;">
                <div class="skidka__vvod" id="skidka_email">
                    <input type="email" type="email" required name="E-mail" placeholder="E-mail" class="skidka__input"></input>
                    <span class="skidka__placeholder">Введите корректный e-mail</span>
                </div>
                <a class="btn skidka__submit" id="skidka_submit">
                    <span>Подписаться</span>
                </a>
            </form>
            <script>
                function validate(email, selector) {
                    var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
                    if (reg.test(email) == false) {
                        document.querySelector(selector).innerHTML = 'Введите корректный e-mail';
                        return false;
                    } else {
                        return true;
                    }
                }
                document.querySelectorAll(".skidka__vvod").forEach(function(element) {
                    element.addEventListener('click', function() {
                        if (element.classList.contains('error')) {
                            element.classList.remove('error')
                        }
                    })
                })
                var form2 = document.querySelector("form.skidka__form");
                var form_email2 = document.querySelector("#skidka_email");
                var form_submit2 = document.querySelector("#skidka_submit");
                form_submit2.addEventListener('click', function(e) {
                    let form_email_value = document.querySelector("#skidka_email .skidka__input").value;
                    if (!form_email_value || !validate(form_email_value, '#skidka_email span')) {
                        if (!form_email2.classList.contains("error")) {
                            form_email2.classList.add("error")
                        }
                    }
                    if (form_email_value && validate(form_email_value, '#skidka_email span')) {
                        let request = new XMLHttpRequest();
                        let site = 'http://' + document.domain + '/mail.php'; //ПОМЕНЯТЬ НА HTTPS
                        request.open('POST', `${site}`);
                        let formData = new FormData(form2);
                        console.log(formData)
                        formData.append('form', form2.getAttribute('name'))
                        request.send(formData);
                        request.addEventListener('readystatechange', function() {
                            if (request.readyState < 4) {
                                console.log('Отправка')
                            } else if (request.readyState === 4 && request.status == 200) {
                                if (!modal.classList.contains('active')) {
                                    document.querySelector("#send-text").innerHTML = "Успешная подписка";
                                    modal.classList.add('active')
                                    document.querySelectorAll(".skidka__vvod").forEach(function(element) {
                                        element.classList.remove('error')
                                    })
                                    setTimeout(closeModal, 4000);
                                }
                            }
                        })
                    }
                })
            </script>
        </div>
    </div>
</div>