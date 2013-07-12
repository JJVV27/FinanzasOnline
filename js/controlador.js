$(document).on("ready", inicio);

function inicio(){
	activo();
	$('.btn-return').on("click", noreturn);
	$('.mostrar-video').on("click", mostrarVideo);
	$('.link-acercade').on("click", menuad);

   //slider


    
    //tabs

    $("#nav li a").click(function() {
 		
 		var dt = $(this).attr('data-titulo');
 		var dts = $(this).attr('data-subtitulo');

        $("#ajax-content").empty().append("<div id='loading'><img class='loader' src='img/loader.gif' alt='Loading' /></div>");
        $("#nav li a").removeClass('current-tab');
        $(this).addClass('current-tab');

        $.ajax({ url: this.href, success: function(html) {
           	$("#ajax-content").empty().append(html);
            $('.titulo-app').text(dt);
            console.log(dts);
             $('.subt-app').text(dts);
           	
            }
    });
	    return false;
	    });
	 
	    $("#ajax-content").empty().append("<div id='loading'><img class='loader' src='img/loader.gif' alt='Loading' /></div>");
	    $.ajax({ url: 'ajax/estado.php', success: function(html) {
	            $("#ajax-content").empty().append(html);
	    }
	    });

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

function noreturn(){
	return false;
}

function mostrarVideo(){
	$('.video').slideDown();
}