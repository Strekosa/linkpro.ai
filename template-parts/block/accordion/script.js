
// Targetting all the .accordion classes
let question = document.getElementsByClassName('question')

for(let i=0;i<question.length;i++){
	question[i].addEventListener('click',function(){
		let answer = this.nextElementSibling

		if(answer.style.maxHeight){
			answer.style.maxHeight=null;
			this.classList.remove('active')
			this.getElementsByClassName('question__icon')[0].classList.remove("active");
		}
		//if panel is closed, then this block will open it on mouse click
		else{

			for(let x=0;x<question.length; x++){
				question[x].classList.remove('active')
				question[x].nextElementSibling.style.maxHeight=null;
				question[x].getElementsByClassName('question__icon')[0].classList.remove("active");
			}

			//if panel is closed, then these codes will open it on mouse click & set those specific rules mentioned below.

			answer.style.maxHeight = answer.scrollHeight + 'px';
			this.classList.toggle('active')
			this.getElementsByClassName('question__icon')[0].classList.toggle("active");
		}
	})
}

// jQuery(document).ready(() => {
// 	$('.accordion-list > li > .answer').hide();
//
// 	$('.accordion-list > li').click(function () {
//
// 		if ($(this).hasClass("active")) {
// 			$(this).removeClass("active").find(".answer").slideUp();
//
// 		} else {
// 			$(".accordion-list > li.active .answer").slideUp();
// 			$(".accordion-list > li.active").removeClass("active");
// 			$(this).addClass("active").find(".answer").slideDown();
// 		}
// 		return false;
// 	});
// });



