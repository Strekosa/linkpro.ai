jQuery(document).ready(() => {

});


const tabLinks = document.querySelectorAll('.price-cards__tab')

if (tabLinks.length > 0) {
	for (let i = 0; i < tabLinks.length; i++) {
		const thisTab = tabLinks[i];
		thisTab.addEventListener("click", function (e) {
			const tabAttribute = e.target.getAttribute('data-tab');
			const tabContent = document.querySelectorAll('.' + tabAttribute);
			const activeItems = document.querySelectorAll('.active');

			activeItems.forEach(function (el) {
				el.classList.remove("active");
			});

			tabContent.forEach(function (el) {
				el.classList.add("active");
			});

			thisTab.classList.add("active");

			console.log(tabAttribute, 'test');

		});
	}
}
