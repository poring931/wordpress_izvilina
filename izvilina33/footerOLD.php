<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Izvilina33
 */

?>
<!-- <link rel="stylesheet" href="/wp-content/themes/izvilina33/css/footer.css"> -->
<div class="modal">
	<div class="modal__content">
		<p>
			<span id="send-text">Успешная отправка</span>
			<img loading="lazy" decoding="async" width="50" height="50" src="/wp-content/themes/izvilina33/images/icons/success.svg" alt="">
		</p>
		<div class="modal__close" id="form-success"></div>
	</div>
</div>
<section class="section_block container">
	<form action="" class="poboltaem" name="Форма с вопросом">
		<img loading="lazy" decoding="async" height="207" width="207" class="poboltaem__mail-img" src="/wp-content/themes/izvilina33/images/mail-dynamic-color.png" alt="">
		<img loading="lazy" decoding="async" class="poboltaem__phone-img" src="/wp-content/themes/izvilina33/images/phone-end-dynamic-color.png" alt="">
		<p class="poboltaem__title">ПОБОЛТАЕМ?</p>
		<p class="poboltaem__text">Если у вас остались вопросы, мы с<br> удовольствием на них ответим</p>
		<div class="poboltaem__blocks">
			<div class="poboltaem__block left">
				<div class="poboltaem__vvod" id="form-name">
					<input type="text" class="poboltaem__input" name="Имя" placeholder="Имя">
					<span class="poboltaem__placeholder">Это обязательное поле</span>
				</div>
				<div class="poboltaem__vvod" id="form-email">
					<input type="email" class="poboltaem__input" name="Контакты" placeholder="E-mail или телефон">
					<span class="poboltaem__placeholder">Введите корректные данные</span>
				</div>

				<a id="form-submit" class="btn poboltaem__submit">Отправить</a>
			</div>
			<div class="poboltaem__block right">
				<div class="poboltaem__vvod" id="form-text">
					<textarea class="poboltaem__textarea" placeholder="Ваш вопрос" name="Вопрос" id="form-text"></textarea>
					<span class="poboltaem__placeholder">Это обязательное поле</span>
				</div>
				<p class="block__text">Нажимая “отправить”, вы соглашаетесь на обработку своих <br>персональных данных в соответствии с <a class="poboltaem__politika" href="">политикой конфиденциальности</a></p>
			</div>
		</div>
		<script>
			function closeModal() {
				modal.classList.remove('active');
			}
			document.querySelectorAll(".poboltaem__vvod").forEach(function(element) {
				element.addEventListener('click', function() {
					if (element.classList.contains('error')) {
						element.classList.remove('error')
					}
				})
			})
			var form = document.querySelector("form.poboltaem");
			var form_name = document.querySelector("#form-name");
			var form_email = document.querySelector("#form-email");
			var form_text = document.querySelector("#form-text");
			var form_submit = document.querySelector("#form-submit");
			var close_modal_btn = document.querySelector('.form-success');
			var modal = document.querySelector("div.modal");
			var modal_window = modal.querySelector("div.modal .modal__content");
			modal.addEventListener('click', function(e) {
				if (modal.classList.contains('active')) {
					if (!modal_window.contains(e.target)) {
						closeModal()
					}
				}
			})
			close_modal_btn && close_modal_btn.addEventListener('click', function() {
				closeModal()
			})
			form_submit.addEventListener('click', function() {
				let form_name_value = document.querySelector("#form-name .poboltaem__input").value;
				let form_email_value = document.querySelector("#form-email .poboltaem__input").value;
				let form_text_value = document.querySelector("#form-text .poboltaem__textarea").value;
				// if(!form_name_value){
				// 	if (!form_name.classList.contains("error")){
				// 		form_name.classList.add("error")
				// 	}
				// }
				if (!form_email_value) {
					if (!form_email.classList.contains("error")) {
						form_email.classList.add("error")
					}
				}
				// if(!form_text_value){
				// 	if (!form_text.classList.contains("error")){
				// 		form_text.classList.add("error")
				// 	}
				// }
				if (form_email_value) {
					let request = new XMLHttpRequest();
					let site = 'http://' + document.domain + '/mail.php'; //ПОМЕНЯТЬ НА HTTPS
					request.open('POST', `${site}`);
					let formData = new FormData(form);
					formData.append('form', form.getAttribute('name'))
					request.send(formData);
					request.addEventListener('readystatechange', function() {
						if (request.readyState < 4) {
							console.log('Отправка')
						} else if (request.readyState === 4 && request.status == 200) {
							if (!modal.classList.contains('active')) {
								document.querySelector("#send-text").innerHTML = "Успешная отправка";
								document.querySelectorAll(".poboltaem__vvod").forEach(function(element) {
									element.classList.remove('error')
								})
								modal.classList.add('active')
								setTimeout(closeModal, 4000);
							}
						}
					})
				}
			})
		</script>
	</form>
</section>
<footer id="colophon" class="container">
	<div class="footer_table">
		<a href="/"><img loading="lazy" decoding="async" style="width: 180px;" src="/wp-content/themes/izvilina33/images/logo.svg" alt=""></a>
		<p class="footer__copyright"><br>© 2021—2022.<br><br>
			«Извилина» полезные услуги<br> в г. Владимир. Все права защищены.</p>
	</div>
	<div class="footer_table footer_menu">
		<?php
		wp_nav_menu(
			array(
				'container' => '',
				'menu_class' => 'footer-menu',
				'theme_location' => 'bottom-menu-1',
			)
		);
		?>
	</div>
	<div class="footer_table footer_menu">
		<?php
		wp_nav_menu(
			array(
				'container' => '',
				'menu_class' => 'footer-menu',
				'theme_location' => 'bottom-menu-2',
			)
		);
		?>
	</div>
	<div class="footer_table">
		<div class="header_socials">
			<? if (get_field('socials', 'option')["почта"]) : ?>
				<a class="social_item" href="<?= get_field('socials', 'option')["почта"]; ?>">
					<img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/mail_icon.svg" alt="">
				</a>
			<? endif; ?>
			<? if (get_field('socials', 'option')["телефон"]) : ?>
				<a class="social_item" href="<?= get_field('socials', 'option')["телефон"]; ?>">
					<img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/phone_icon.svg" alt="">
				</a>
			<? endif; ?>
			<? if (get_field('socials', 'option')["вконтакте"]) : ?>
				<a class="social_item" href="<?= get_field('socials', 'option')["вконтакте"]; ?>">
					<img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/vk_icon.svg" alt="">
				</a>
			<? endif; ?>
			<? if (get_field('socials', 'option')["инстаграм"]) : ?>
				<a class="social_item" href="<?= get_field('socials', 'option')["инстаграм"]; ?>">
					<img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/instagram_icon.svg" alt="">
				</a>
			<? endif; ?>
		</div>
	</div>
	<div class="footer_table footer_callback">
		<button class="btn btn_icon">
			<img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/phone_for_btn.png" alt="">
			Заказать звонок
		</button>
		<a href="https://impulse.guru/"><img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/impulse.guru.svg" alt="" class="impulse-guru"></a>
	</div>
</footer><!-- #colophon -->




<div class="overlay"> </div>
<div class="map_modal modal_wrapper "> </div>



<!-- <script src="/wp-content/themes/izvilina33/js/tiny_slider/tiny-slider.js"></script>
<? if (is_front_page()) : ?>
<script async src="/wp-content/themes/izvilina33/js/index_page.js"></script>

<? endif; ?>


<script src="/wp-content/themes/izvilina33/js/common.js"></script>
 -->




<?php wp_footer(); ?>


</body>

</html>