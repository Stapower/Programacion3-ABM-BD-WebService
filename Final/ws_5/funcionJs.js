function llamada()
{


	$.ajax({
		url : "nexo.php",
		type : "POST",
		//contentType: "application/json; charset=utf-8",
   		//dataType: "json",
		data : {queHacer : "traer"}

	})
	.then(function(retorno)
	{	
		console.log(retorno);
		alert("Ok "+retorno);

	},function(retorno){
		console.log(retorno);
	});

}