$(document).ready(function() {

	$('nav ul li > a:not(:only-child)').click(function(e){
		$(this)
			.siblings('.nav-dropdown')
			.toggle()

		$('.nav-dropdown')
			.not($(this).siblings())
			.hide()

		e.stopPropagation()

	})

	$('html').click(function(){
		$('.nav-dropdown').hide()
	})

	$('#nav-toggle').click(function(){
		this.classList.toggle('active')
		$('nav ul').toggle()
	})

})