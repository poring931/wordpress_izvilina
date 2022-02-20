<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Izvilina33
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<div class="preloader">
	<div class="lds-ellipsis">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<img width="63" height="63" class="preloader__image" src="/wp-content/themes/izvilina33/images/icons/logo_icon.svg" alt="">
</div>
<style>
	.lds-ellipsis {
		display: inline-block;
		position: relative;
		width: 80px;
		height: 80px;
		position: absolute;
		top: 58%;
		left: 50%;
		transform: translate(-50%, -50%);
	}

	.lds-ellipsis div {
		position: absolute;
		top: 33px;
		width: 13px;
		height: 13px;
		border-radius: 50%;
		background: #fff;
		animation-timing-function: cubic-bezier(0, 1, 1, 0);
	}

	.lds-ellipsis div:nth-child(1) {
		left: 8px;
		animation: lds-ellipsis1 0.6s infinite;
	}

	.lds-ellipsis div:nth-child(2) {
		left: 8px;
		animation: lds-ellipsis2 0.6s infinite;
	}

	.lds-ellipsis div:nth-child(3) {
		left: 32px;
		animation: lds-ellipsis2 0.6s infinite;
	}

	.lds-ellipsis div:nth-child(4) {
		left: 56px;
		animation: lds-ellipsis3 0.6s infinite;
	}

	@keyframes lds-ellipsis1 {
		0% {
			transform: scale(0);
		}

		100% {
			transform: scale(1);
		}
	}

	@keyframes lds-ellipsis3 {
		0% {
			transform: scale(1);
		}

		100% {
			transform: scale(0);
		}
	}

	@keyframes lds-ellipsis2 {
		0% {
			transform: translate(0, 0);
		}

		100% {
			transform: translate(24px, 0);
		}
	}

	.preloader {
		position: fixed;
		left: 0;
		top: 0;
		right: 0;
		bottom: 0;
		overflow: hidden;
		background: linear-gradient(180deg, rgba(6, 78, 55, 1) 0%, #064E37 100%);
		z-index: 1001;
		color: #eee;
	}

	.preloader__image {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
		animation: preloader-rotate 4s infinite linear;
	}

	@keyframes preloader-rotate {
		0% {
			transform: scale(1.2) translate(-50%, -50%);
		}

		25% {
			transform: scale(1) translate(-50%, -50%);
		}

		50% {
			transform: scale(1.2) translate(-50%, -50%);
		}

		100% {
			transform: scale(1) translate(-50%, -50%);
		}
	}

	.loaded_hiding .preloader {
		transition: 0.3s opacity;
		opacity: 0;
	}

	.loaded .preloader {
		display: none;
	}
</style>


<body <?php body_class(); ?>>


	<header id="masthead">
		<div class="mobile_menu">
			<a class="header_top_logo" href="/">
				<img src="/wp-content/themes/izvilina33/images/logo.png" alt="">
			</a>

			<div class="header_socials">
				<? if (get_field('socials', 'option')["телефон"]) : ?>
					<a class="social_item" href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', get_field('socials', 'option')["телефон"]); ?>">
						<img width="18" hight="23" src="/wp-content/themes/izvilina33/images/icons/phone_icon.svg" alt="">
					</a>
				<? endif; ?>
				<? if (get_field('socials', 'option')["инстаграм"]) : ?>
					<a class="social_item" href="<?= get_field('socials', 'option')["инстаграм"]; ?>" target="blank_">
						<img width="26" hight="25" src="/wp-content/themes/izvilina33/images/icons/instagram_icon.svg" alt="">
					</a>
				<? endif; ?>
				<? if (get_field('socials', 'option')["почта"]) : ?>
					<a class="social_item" href="mailto:<?= get_field('socials', 'option')["почта"]; ?>">
						<img width="22" hight="16" src="/wp-content/themes/izvilina33/images/icons/mail_icon.svg" alt="">
					</a>
				<? endif; ?>

				<? if (get_field('socials', 'option')["вконтакте"]) : ?>
					<a class="social_item" href="<?= get_field('socials', 'option')["вконтакте"]; ?>">
						<img width="26" hight="15" src="/wp-content/themes/izvilina33/images/icons/vk_icon.svg" alt="">
					</a>
				<? endif; ?>

			</div>
			<div class="menu-burger ">
				<span></span><span></span><span></span>
			</div>
		</div>
		<div class="pc_menu">
			<div class="close-menu"></div>
			<div class="container header_top">
				<a class="header_top_logo" href="/">
					<img width="238" hight="58" src="/wp-content/themes/izvilina33/images/logo.png" alt="">
				</a>

				<div class="header_top_geo_work">
					<div class="header_top_geo">
						<img width="18" hight="23" src="/wp-content/themes/izvilina33/images/icons/geo_icon.svg" alt="">
						<span>
							<? if (get_field('город', 'option')) : ?>
								<? the_field('город', 'option'); ?>
							<? endif; ?>
						</span>
					</div>
					<div class="header_top_time">
						<? if (get_field('режим_работы', 'option')) : ?>
							<? the_field('режим_работы', 'option'); ?>
						<? endif; ?>
					</div>
				</div>
				<div class="header_socials">
					<? if (get_field('socials', 'option')["почта"]) : ?>
						<a class="social_item" href="mailto:<?= get_field('socials', 'option')["почта"]; ?>">
							<img width="22" hight="16" src="/wp-content/themes/izvilina33/images/icons/mail_icon.svg" alt="">
						</a>
					<? endif; ?>
					<? if (get_field('socials', 'option')["телефон"]) : ?>
						<a class="social_item" href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', get_field('socials', 'option')["телефон"]); ?>">
							<img width="18" hight="23" src="/wp-content/themes/izvilina33/images/icons/phone_icon.svg" alt="">
						</a>
					<? endif; ?>
					<? if (get_field('socials', 'option')["вконтакте"]) : ?>
						<a class="social_item" href="<?= get_field('socials', 'option')["вконтакте"]; ?>">
							<img width="26" hight="15" src="/wp-content/themes/izvilina33/images/icons/vk_icon.svg" alt="">
						</a>
					<? endif; ?>
					<? if (get_field('socials', 'option')["инстаграм"]) : ?>
						<a class="social_item" href="<?= get_field('socials', 'option')["инстаграм"]; ?>" target="blank_">
							<img width="26" hight="25" src="/wp-content/themes/izvilina33/images/icons/instagram_icon.svg" alt="">
						</a>
					<? endif; ?>
				</div>
				<button class="header_callback call_btn btn white_btn">
					Связаться с нами
				</button>
			</div>
			<div class="container header_bottom">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</div>
		</div>



	</header><!-- #masthead -->
	<script>
		window.onload = function() {
			document.body.classList.add('loaded_hiding');
			window.setTimeout(function() {
				document.body.classList.add('loaded');
				document.body.classList.remove('loaded_hiding');
			}, 500);
		}
	</script>