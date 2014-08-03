$(function(){
	denuncia = JSON.parse(localStorage.getItem("denuncia"));

	$("#referencia").html(denuncia.complaints.id);
	$("#quepaso").html(denuncia.complaints.que_paso);

	$("#tipologia").html(denuncia.Tipologies.name);
	$("#subtipologia").html(denuncia.Subtipologies.name);

	$("#departamento").html(denuncia.Regions.nombre_departamento);
	$("#municipio").html(denuncia.Regions.nombre_municipio);

	$("#fecha_registro").html(denuncia.complaints.created);

	$("#doc_ciudadano").html(denuncia.Users.username);
})