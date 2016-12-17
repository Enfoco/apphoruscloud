$("#departamento").change(function() {
                $("#departamento option:selected").each(function() {
                    departamento = $('#departamento').val();
                    $.post("http://localhost:81/avs/institution/municipio", {
                        departamento : departamento
                    }, function(data) {
                        $("#municipio").html(data);
                    });
                });
            });

$('#btn_inst').click(function(){
 var url;

url = "http://localhost:81/avs/institution/save";

 $.ajax({
        url : url,
        type: "POST",
        data: $('#save_inst').serialize(),
        dataType: "JSON",
        encode:true,
        success: function(data){
          if(!data.success){
          	  if(data.errors){
          	  	alertify.warning('Oops!!, verifica los datos');
          		$('#message').html(data.errors).addClass('alert alert-danger');
          	}
          }else{
          	 alertify.success(data.message);
            	reset();
          }
         
        },
         
    });

});

function reset()
{
	$('#save_inst')[0].reset();
};




	

