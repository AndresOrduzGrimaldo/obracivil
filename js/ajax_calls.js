


$(document).ready(function()
{
	$('.registro-display').on('click', function()
	{
		$('.submenu-hijo2').slideToggle('slow');
	});
});

$(document).ready(function()
{
	$('.nombre-perfil').on('click', function()
	{
		$('.submenu-hijo').slideToggle('slow');
	});
});

/////////////////////////////////////////////////////////
//////////// Registro y login de un usuario en el sistema
/////////////////////////////////////////////////////////

$('#registroIng').validate({
	rules:{
		nombreing :{required:true },
		apellidoing:{required:true},
		email:{required:true,email:true},
		fecha:{required:true},
		cedula:{required:true,number:true},
		password:{required:true},
		password_re:{required:true, equalTo:"#password"}
	},
	messages:
  {
    nombreing :"Nombre Vacio",
		apellidoing:"Apellido vacio",
		email:"Email vacio o no valido",
		fecha:"fecha vacia",
		cedula:"Cedula vacia",
		password:"contraseña vacia",
		password_re:"contraseñas no coinciden"
	},
submitHandler: function(form){
	console.log('llegamos hast aqui');


		$.ajax({
			url: $('#registroIng').attr('action'),
			method:'post',
			data:$('#registroIng').serialize(),
			success : function(data)
			{
				$('#success').html(data); // cambiar los .val
				$('#nombreing').val('')
				$('#apellidoing').val('')
				$('#email').val('')
				$('#fecha').val('')
				$('#cedula').val('')
				$('#password').val('')
				$('#password_re').val('')
				$('#myModalRegistro').modal('hide')
			}
		});
 }
});

$('#loginData').validate({
	rules:{
		usuario :{required:true},
		pass:{required:true },
	},
	messages:
	{
		usuario : "Email vacio o invalido",
		pass: "Contraseña Vacia"
	},
submitHandler: function(form){
	var formulario = $('#loginData');
	console.log('llegamos a logi');
 $.ajax({
	url: formulario.attr('action'),
	method:'post',
	data:formulario.serialize(),
 success : function(data)
	{
		var obj = JSON.parse(data);
    if(obj.login==true)
    {
      document.location.href='perfil_ing.php';
    }
		else
		{
			$('#div_error_login').html(obj.error);
			$('#usuario').val('')
			$('#pass').val('')
		}
	}
});
}
});
/////////////////////////////////////////////////////////
//////////// termina Registro y login de un usuario en el sistema
/////////////////////////////////////////////////////////







/////////////////////////////////////////////////////////
//////////// CRUD sobre las obras del sistema
/////////////////////////////////////////////////////////



// Permite abrir el modal con la informacion de una obra para eliminar
$('#dataDelete').on('show.bs.modal', function(event){

	var este=$(this);
  console.log('elimnar');
  var button=$(event.relatedTarget);
	var id=button.data('id');

	var modal = $('#dataDelete');

  modal.find('#IDeliminar').val(id);

});


// Permite abrir el modal con la informacion de una obra para modificar
$('#modalobra').on('show.bs.modal', function(event){

	var este=$(this);
  console.log('actualizaa');
  var button=$(event.relatedTarget);
	var id=button.data('id');
	var nombre = button.data('nombre');
	var fechaini = button.data('fechaini');
	var fechafin = button.data('fechafin');

	console.log(nombre);
	console.log(fechafin);
	console.log(fechaini);

	var modal = $('#modalobra')	;

  modal.find('#ID').val(id);
	modal.find('#nombreobra').val(nombre);
	modal.find('#iniobra').val(fechaini);
	modal.find('#finobra').val(fechafin);
});



// Permite modificar una obra
$('#modificarObra').validate({
	rules:{
		nombreobra :{required:true},
		iniobra:{required:true},
		finobra:{required:true },
	},
	messages:
	{
		nombreobra : "Nombre vacio",
		iniobra: "Fecha Vacia",
		finobra: "Fecha Vacia",
	},
submitHandler: function(form){
	var formulario = $('#modificarObra');
	console.log('llegamos a modificar');
 $.ajax({
	url: formulario.attr('action'),
	method:'post',
	data:formulario.serialize(),
 success : function(data)
	 {
			$('#div_ajax_update').html(data);

	 }
  });
 }
});

// permite registrar una obra
$('#registrarObra').validate({
	rules:{
		nameobra :{required:true},
		inicioobra:{required:true},
		finalobra:{required:true },
	},
	messages:
	{
		nameobra : "Nombre vacio",
		inicioobra: "Fecha Vacia",
		finalobra: "Fecha Vacia",
	},
submitHandler: function(form){
	var formulario = $('#registrarObra');
	console.log('llegamos a registrar');
 $.ajax({
	url: formulario.attr('action'),
	method:'post',
	data:formulario.serialize(),
 success : function(data)
	 {
			$('#div_ajax_registro').html(data);
			$('#nameobra').val('')
			$('#inicioobra').val('')
			$('#finalobra').val('')
	 }
  });
 }
});

// eliminar una obra
// $("#eliminarObra").submit(function( event )
// 	 {
// 		debugger
// 		var parametros = $('#eliminarObra').serialize();
// 			 $.ajax({
// 					type: "POST",
// 					url: $('#eliminarObra').attr('action'),
// 					data: parametros,
// 					success: function(datos){
// 					$(".div_ajax_delete").html(datos);

// 					$('#dataDelete').modal('hide');
// 				  }
// 			});
// 		});


/////////////////////////////////////////////////////////
//////////// Termina CRUD sobre las obras del sistema
/////////////////////////////////////////////////////////








/////////////////////////////////////////////////////////
//////////// CRUD sobre los proveedores del sistema
/////////////////////////////////////////////////////////

// Permite modificar un proveedor del sistema
$('#modalproveedor').on('show.bs.modal', function(event){

	var este=$(this);
  console.log('proveedor');
  var button=$(event.relatedTarget);
	var id=button.data('id');
	var nombre = button.data('nombre');
	var telefono = button.data('telefono');
	var direccion = button.data('direccion');
	var nit = button.data('nit');

	console.log(nombre);


	var modal = $('#modalproveedor')	;

  modal.find('#IDproveedor').val(id);
	modal.find('#nombreproveedor').val(nombre);
	modal.find('#nitproveedor').val(nit);
	modal.find('#telefonoproveedor').val(telefono);
	modal.find('#direccionproveedor').val(direccion);
});

$('#modificarProveedor').validate({
	rules:{
		nombreproveedor :{required:true},
		nitproveedor:{required:true},
		telefonoproveedor:{required:true },
		direccionproveedor:{required:true},
	},
	messages:
	{
		nombreproveedor :"Nombre Vacio",
		nitproveedor:"NIT vacio",
		telefonoproveedor:"Telefono vacio",
		direccionproveedor:"Direccion vacia",
	},
submitHandler: function(form){
	var formulario = $('#modificarProveedor');
	console.log('llegamos a modificar');
 $.ajax({
	url: formulario.attr('action'),
	method:'post',
	data:formulario.serialize(),
 success : function(data)
	 {
			$('#div_ajax_update_pro').html(data);
	 }
  });
 }
});

// Permite abrir el modal para eliminar un proveedor
$('#deleteProveedor').on('show.bs.modal', function(event){

	var este=$(this);
  console.log('elimnar');
  var button=$(event.relatedTarget);
	var id=button.data('id');

	var modal = $('#deleteProveedor');

  modal.find('#IDeliminarPro').val(id);

});


// Permite registrar un proveedor en el sistema
$('#registrarProveedor').validate({
	rules:{
		nameproveedor :{required:true},
		nitprovee:{required:true},
		telefonopro:{required:true },
		direccionpro:{required:true},
	},
	messages:
	{
		nameproveedor :"Nombre Vacio",
		nitprovee:"NIT vacio",
		telefonopro:"Telefono vacio",
		direccionpro:"Direccion vacia",
	},
submitHandler: function(form){
	var formulario = $('#registrarProveedor');
	console.log('llegamos a registrarmee');
 $.ajax({
	url: formulario.attr('action'),
	method:'post',
	data:formulario.serialize(),
 success : function(data)
	 {
			$('#div_ajax_registro_pro').html(data);
			$('#nameproveedor').val('')
			$('#nitprovee').val('')
			$('#telefonopro').val('')
			$('#direccionpro').val('')
	 }
  });
 }
});

/////////////////////////////////////////////////////////
//////////// Termina CRUD sobre los proveedores del sistema
/////////////////////////////////////////////////////////





/////////////////////////////////////////////////////////
//////////// CRUD sobre los empleados del sistema
/////////////////////////////////////////////////////////

$('#registrarEmpleadoForm').validate({
	rules:{
		codigoempleado:{required:true},
		nameempleado :{required:true},
		apellidoemp:{required:true},
		cedulaemp:{required:true },
		fechanac:{required:true},
		salarioemp:{required:true},
		emailemp:{required:true, email:true}
	},
	messages:
	{
		codigoempleado:"Codigo Vacio",
		nameempleado :"Nombre Vacio",
		apellidoemp:"NIT vacio",
		cedulaemp:"Telefono vacio",
		fechanac:"Direccion vacia",
		salarioemp:" Salario Vacio",
    emailemp:"email vacio"
	},
submitHandler: function(form){
	var formulario = $('#registrarEmpleadoForm');
	console.log('llegamos a registrarmee emp');
 $.ajax({
	url: formulario.attr('action'),
	method:'post',
	data:formulario.serialize(),
 success : function(data)
	 {
			$('#div_ajax_registro_emp').html(data);
			$('#codigoempleado').val('')
			$('#nameempleado').val('')
			$('#apellidoemp').val('')
			$('#cedulaemp').val('')
			$('#fechanac').val('')
			$('#emailemp').val('')
	 }
  });
 }
});



// Modal para administrar Obra
$('#administrar_obra').on('show.bs.modal', function(event){

	debugger
	var este=$(this);
  var button=$(event.relatedTarget);
	var id=button.data('id');
	var nombre = button.data('nombre');
  console.log(id);

	$('#nombre_obra').html(nombre);
	var modal = $('#administrar_obra');
	modal.find('#IDOBRA').val(id);
});



$('#modalSuministro').on('show.bs.modal', function(event){

	var este=$(this);
  console.log('sumiiiin');
  var button=$(event.relatedTarget);
	var id=button.data('id');

	var modal = $('#modalSuministro');
	modal.find('#idPro').val(id)
});


// permite agregar un suministro
$('#suministroForm').validate({
	rules:{
		nombresuministro:{required:true},
		descripcionsum :{required:true},
		precio:{required:true}
	},
	messages:
	{
		nombresuministro:"Nombre Vacio",
		descripcionsum :"Descripcion Vacio",
		precio:"Precio Vacio",
	},
submitHandler: function(form){
	var formulario = $('#suministroForm');
	console.log('llegamos a sumiiiii');
 $.ajax({
	url: formulario.attr('action'),
	method:'post',
	data:formulario.serialize(),
 success : function(data)
	 {
			$('#div_ajax_registro_sum').html(data);
			$('#nombresuministro').val('')
			$('#descripcionsum').val('')
			$('#precio').val('')
			$('#medida').val('')
	 }
  });
 }
});


$('#obra_admin').validate({
	rules:{
		cantidadped:{required:true},
	},
	messages:
	{
		cantidadped:"Cantidad Vacio",
	},
submitHandler: function(form){
	var formulario = $('#obra_admin');
	console.log('llegamos a sumiiiii');
 $.ajax({
	url: formulario.attr('action'),
	method:'post',
	data:formulario.serialize(),
 success : function(data)
	{
			$('#div_ajax_suministro_obra').html(data);
			$('#cantidadped').val('')
	}
  });
 }
});
