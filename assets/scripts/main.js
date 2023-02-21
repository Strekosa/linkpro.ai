// import external dependencies

import "jquery";
import "masonry-layout";

// Import Slick
import 'slick-carousel';

// Import everything from autoload
import "./autoload/**/*"


// Menu
"use strict"
const isMobile = {
	Android: function () {
		return navigator.userAgent.match(/Android/i);
	},
	Opera: function () {
		return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function () {
		return navigator.userAgent.match(/IEMobile/i);
	},
	BlackBerry: function () {
		return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function () {
		return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	},
	any: function () {
		return (
			isMobile.Android() ||
			isMobile.Opera() ||
			isMobile.BlackBerry() ||
			isMobile.iOS() ||
			isMobile.Windows()
		);
	},
}

if (isMobile.any()) {
	document.body.classList.add('_touch')

	let menuArrows = document.querySelectorAll('.nav-desc')
	if (menuArrows.length > 0) {
		for (let i = 0; i < menuArrows.length; i++) {
			let thisArrow = menuArrows[i];
			let subMenu = menuArrows[i].nextElementSibling;
			menuArrows[i].addEventListener("click", function () {
				// menuArrow.parentElement.classList.toggle('active');
				subMenu.classList.toggle('active');
				thisArrow.classList.toggle('active');
			});
		}
	}
} else {
	document.body.classList.add('_pc')
}

// Menu  Burger
const iconMenu = document.querySelector('.navbar-toggler');
if (iconMenu) {
	const menuBody = document.querySelector('.navbar-collapse');
	iconMenu.addEventListener("click", function () {
		document.body.classList.toggle('lock');
		iconMenu.classList.toggle('open');
		menuBody.classList.toggle('open');

	});
}

import Masonry from 'masonry-layout'

window.onload = () => {
	const grid = document.querySelector('.reviews__list');
	const masonry = new Masonry(grid, {
		itemSelector: '.reviews__item',
	});

	masonry.on('LayoutComplete', () => console.log('LayoutComplete'));

}

$(".slider").on("afterChange", function () {
	const grid = document.querySelector('.reviews__list');
	const masonry = new Masonry(grid, {
		itemSelector: '.reviews__item',
	});

	masonry.on('LayoutComplete', () => console.log('LayoutComplete'));
});


