$(function(){
	$('.galeria .contenedor-imagen').on('click', function(){
		$('#modal').modal;
		var ruta_imagen = ($(this).find('img').attr('src'));
		$('#imagen-modal').attr('src',ruta_imagen);
	});

	$('#modal').on('click',function(){
		$('#modal').modal('hide');
	});

	$('.btn-contacto').hover(function(){

		var titulo= $(this).attr('title');
		$(this).data('titulo', titulo).removeAttr('title');

		$('<p class= "tooltip"><?p>')
		.text(titulo)
		.appendTo('body')
		.fadeIn('slow');



	},function(){

		$(this).attr('title', $(this).data('titulo'));
		$('.tooltip').remove();
	});
	
	

})

function ocultar(){
	document.getElementById('form_crear').style.display = 'none';
	document.getElementById('form_eliminar').style.display = 'block';

	}

	function mostrar(){
		document.getElementById('form_crear').style.display = 'block';
		document.getElementById('form_eliminar').style.display = 'none';
		}

		function obtenerCategoria(){
			var select = document.getElementById("categoria"), //El <select>
				value = select.value, //El valor seleccionado
				text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
				
				return text;
				
				
		}

		function verMas(){
			document.getElementById.this('desc_completa').style.display = 'block';
			document.getElementById.this('extracto').style.display = 'none';

		}
		function verMenos(){
			document.getElementById('desc_completa').style.display = 'none';
			document.getElementById('extracto').style.display = 'block';

		}