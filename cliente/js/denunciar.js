server = "http://localhost:8000/app_appuestaSocial/servidor/";
$(function(){
	// cargar listado de departamentos

	$.post(server+"regions/list_departments_xhr",{},function(response_departamentos){
		response_departamentos = JSON.parse(response_departamentos);

		$.each(response_departamentos,function(key,data_department){
			var cod_departamento = data_department["regions"]["cod_departamento"];
			var nombre_departamento = data_department["regions"]["nombre_departamento"];
			var option = "<option value="+cod_departamento+">"+nombre_departamento+"</option>";
			$("#Departamento").append(option);
		});
		$("#Departamento").change();
	});

	$("#Departamento").change(function(){
		var department_id = $("#Departamento").val();

		$.post(server+"regions/list_municipalities_by_department_id_xhr",{department_id:department_id},function(response_minicipios){
			response_minicipios = JSON.parse(response_minicipios);

			$("#Minicipio").empty();
			$.each(response_minicipios,function(key,data_municipality){
				console.log(data_municipality);

				var cod_municipio = data_municipality["regions"]["cod_municipio"];
				var nombre_municipio = data_municipality["regions"]["nombre_municipio"];

				var option = "<option value="+cod_municipio+">"+nombre_municipio+"</option>";
				$("#Minicipio").append(option);



				//cod_departamento = data_municipality["regions"]["cod_departamento"];
				//nombre_departamento = data_department["regions"]["nombre_departamento"];
				//var option = "<option value="+cod_departamento+">"+nombre_departamento+"</option>";
				//$("#Departamento").append(option);
			});


		})
	});

})