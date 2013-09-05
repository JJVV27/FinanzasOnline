$(document).on("ready", inicio);

function inicio(){
	activo();

	var id_categoria = $('#select-categoria-tr').attr('value');

	$('.btn-return').on("click", noreturn);
	$('.mostrar-video').on("click", mostrarVideo);
	$('.link-acercade').on("click", menuad);
	$('#select-categoria-tr').on("change", obtenerCategoria);

	$('#input-hidden').attr('value', id_categoria);

	 if ($.trim( $('#alertas-contenedor').text() ).length === 0) {
        $('#no-alertas').text('No hay alertas de pago por el momento');
    }


   //moneda

  	var estilos = {
  		background: '#c70000',
  		border: "2px solid #b00000",
  		color: '#eee',
  		display: 'block',
  		'font-size': '1.2em',
  		margin: '0 auto',
  		padding: '0.3em 8%'
   }

   var formEstilos = {
   		background: '#222',
   		border: '2px solid #111',
   		display: 'block',
   		margin: '0 auto',
   		padding: '0.2em 5%',
   		color: '#eee'
   }

   var form = {
   		display: 'inline-block',
   		'vertical-align': 'middle',
   		width: '30%'
   }

   var input ={
   		width: '60%'
   }

   	$('.button-elmn').css(estilos);
	$('.button-act-eg').css(formEstilos);	
	$('.input-lbl-eg').css(form);	
	$('.input-eg').css(input);	

   	//btn-alerta

   	$('.btn-alerta').on("click", cambioAlerta);


	$(".edit").fancybox({
		'titlePosition'		: 'inside',
		'transitionIn'		: 'none',
		'transitionOut'		: 'none'
	});

	$(".edit").fancybox({
		'titlePosition'		: 'inside',
		'transitionIn'		: 'none',
		'transitionOut'		: 'none'
	});

	if($('#img-perfil-usuario').attr('src') == 'img/usuarios/fou-1122-avatar.jpg'){
		$('#cambio-img-perfil').attr('href', '#cambio-imagen-perfil');
	}else{
		$('#cambio-img-perfil').attr('href', '#actualizar-imagen-perfil');
	}

	// ordenar tabla

	$( "#slider" ).slider({
      range: "max",
      min: 1,
      max: 12,
      value: 2,
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.value );
      }
    });
    $( "#amount" ).val( $( "#slider" ).slider( "value" ) );

}

function activo(){
	$(".link[href^='#']")
   .each(function(){ 
      $(this).addClass('activo');
   });
}

function cambioAlerta(){
	$('.btn-alerta').removeClass('btn-default');
	$(this).addClass('btn-default');

	var valorAlerta = $(this).attr('value');

	$('#input-alerta').attr('value', valorAlerta);
	console.log(valorAlerta);
}

function cambioMoneda(){
	alert('moneda');
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

function noreturn(){
	return false;
}

function mostrarVideo(){
	$('.video').slideDown();
}

function obtenerCategoria(){
	id_categoria = $(this).attr('value');
	$('#input-hidden').attr('value', id_categoria);
}