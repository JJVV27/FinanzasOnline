$(document).on("ready", inicio);

function inicio(){
	activo();
	$('.mostrar-video').on("click", mostrarVideo);
	$('.link-acercade').on("click", menuad);
}

function activo(){
	$(".link[href^='#']")
   .each(function(){ 
      $(this).addClass('activo');
   });
}

function menuad(){
	var id = $(this).attr('id');

	$('.link-acercade').removeClass('active-acercade');
	$(this).addClass('active-acercade');
	

	switch(id){
		case 'link-historia':
			$('.article').addClass('hide');
			$('#historia').removeClass('hide');
			$('#historia').addClass('show');
			console.log(id);
		break;
		case 'link-objetivos':
			$('.article').addClass('hide');
			$('#objetivo').removeClass('hide');
			$('#objetivo').addClass('show');
		break;
		case 'link-mision':
			$('.article').addClass('hide');
			$('#mision').removeClass('hide');
			$('#mision').addClass('show');
		break;
	}

}

function mostrarVideo(){
	$('.video').slideDown();
}