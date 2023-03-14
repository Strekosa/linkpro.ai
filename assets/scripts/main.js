// import external dependencies

import "jquery";
import "masonry-layout";

// Import Slick
import 'slick-carousel';

// Import everything from autoload
import "./autoload/**/*"
import Masonry from 'masonry-layout'

// jQuery(window).load(function () {
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

"use strict";
if (jQuery('.et-bfb').length <= 0 && jQuery('.et-fb').length <= 0) {
	jQuery("#loader").fadeOut();
	jQuery(".preloader").delay(1000).fadeOut("slow");
} else {
	jQuery(".preloader").css('display', 'none');
}

$(document).ready(function () {
	$(".letter").keypress(function (event) {
		var inputValue = event.charCode;
		if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
			event.preventDefault();
		}
	});
	$('.number').keypress(function(event) {
			if (event.keyCode == 46 || event.keyCode == 8)
			{
				//do nothing
			}
			else
			{
				if (event.keyCode < 48 || event.keyCode > 57 )
				{
					event.preventDefault();
				}
			}
		}
	);
});



// });
// const tpl = '<section class="table-of-contents"><div>HHHHHHHHHHHH</div><ul>{{contents}}</ul></section>';
// let contents = '';
// const elHeaders = document.querySelectorAll('.text__main > h3');
// elHeaders.forEach((el, index) => {
// 	if (!el.id) {
// 		el.id = `id-${index}`;
// 	}
// 	const url = `${location.href.split('#')[0]}#${el.id}`;
// 	contents += `<li><a href="${url}">${el.textContent}</a></li>`;
// });
// console.log(elHeaders)
// document.querySelector('aside').insertAdjacentHTML('afterbegin', tpl.replace('{{contents}}', contents));

// elHeaders = document.querySelectorAll('.text__main > h3');

