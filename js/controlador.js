$(document).on("ready", inicio);

function inicio(){
	activo();
	$('.mostrar-video').on("click", mostrarVideo);
}

function activo(){
	$(".link[href^='#']")
   .each(function()
   { 
      $(this).addClass('activo');
   });
}

function mostrarVideo(){
	$('.video').slideDown();
}