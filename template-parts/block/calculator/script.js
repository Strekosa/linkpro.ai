jQuery(document).ready(() => {


	$('select').each(function () {
		var $this = $(this), numberOfOptions = $(this).children('option').length;

		$this.addClass('select-hidden');
		$this.wrap('<div class="select"></div>');
		$this.after('<div class="select-styled"></div>');

		var $styledSelect = $this.next('div.select-styled');
		$styledSelect.text($this.children('option').eq(0).text());
		console.log($this.context.id);

		var $list = $('<ul />', {
			'class': 'select-options',
			'id': 'custom-' + $this.context.id,
		}).insertAfter($styledSelect);

		for (var i = 0; i < numberOfOptions; i++) {
			$('<li />', {
				text: $this.children('option').eq(i).text(),
				rel: $this.children('option').eq(i).val(),
				class: i === 0 && 'is-selected',
			}).appendTo($list);
			// if ($this.children('option').eq(i).is(':selected')) {
			// 	$('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
			// }

		}


		var $listItems = $list.children('li').addClass("custom-option");

		$styledSelect.click(function (e) {
			e.stopPropagation();
			$(this).toggleClass('active').next('ul.select-options').toggle();
			$('div.select-styled.active').not(this).each(function () {
				$(this).removeClass('active').next('ul.select-options').hide();
			});
		});


		$listItems.click(function (e) {
			e.stopPropagation();
			$styledSelect.text($(this).text()).removeClass('active');
			$this.val($(this).attr('rel'));
			$list.hide();
		});

		$(".custom-option").on("click", function () {
			$(this).parents(".select").find("select").val($(this).data("value"));
			$(this).parents(".select-options").find(".custom-option").removeClass("is-selected");
			$(this).addClass("is-selected");

		});


		const btns = {
			business: "120",
			pro: "60",
			advanced: "80",
			annual: "12",
			monthly: "1",
			two: "2",
			five: "5",
			ten: "10",
			twenty: "20",
			fifty: "50",
			hundred: "100",
		}

		const price = document.querySelector('.price');
		const term = document.querySelector('.term');
		const allLi = document.querySelectorAll('.custom-option');

		function calculate() {
			const plan = document.querySelector('#custom-plan').querySelector('.is-selected');
			const length = document.querySelector('#custom-length').querySelector('.is-selected');
			const members = document.querySelector('#custom-members').querySelector('.is-selected');

			const planValue = plan && plan.getAttribute('rel');
			const lengthValue = length && length.getAttribute('rel');
			const membersValue = members && members.getAttribute('rel');

			let result = '';

			if (lengthValue === "annual") {
				result = btns[planValue] * btns[lengthValue] * btns[membersValue] * 0.3;
				term.classList.add('sale');
			} else {
				result = btns[planValue] * btns[lengthValue] * btns[membersValue];
				term.classList.remove('sale');
			}

			price.innerHTML = result;
			term.innerHTML = "/" + lengthValue;

			console.log(plan.getAttribute('rel'))
		}

		for (let step = 0; step < allLi.length; step++) {
			allLi[step].addEventListener('click', calculate)
		}
	});
});
