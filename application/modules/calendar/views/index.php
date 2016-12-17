<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url(); ?>assets/fullcalendar/lib/moment.min.js'></script>
<script src='<?php echo base_url(); ?>assets/fullcalendar/lib/jquery.min.js'></script>
<script src='<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.js'></script>
<script src='<?php echo base_url(); ?>assets/fullcalendar/locale/es.js'></script>
<script>

	$(document).ready(function() {

		$.post('<?php echo base_url(); ?>calendar/getEventos',
			function(data){
				
		$('#calendar').fullCalendar({
			
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			lang: 'es',
			defaultDate: new Date(),
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: $.parseJSON(data), 

			navLinks: true, // can click day/week names to navigate views
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				var title = prompt('Event Title:');
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');
			},



			eventDrop: function(event, delta, revertFunc){
				var id = event.id;
				var fi = event.start.format(); 
				var ff = event.end.format();

				if(!confirm("Esta seguro de cambiar la fecha del evento? ")){
					revertFunc();
				}else{
						$.post("<?php echo base_url(); ?>calendar/updEvento",
				{
					id:id,
					fechaIni:fi,
					fechaFin:ff,
				}, 
				function(data){
					if(data == 1){
						alert("Se actualizo el evento correctamente");	
					}else{
						alert("ERROR");	
					}

				});
				}
		       },
		       	eventResize: function(event, delta, revertFunc) {

		        var id = event.id;
				var fi = event.start.format(); 
				var ff = event.end.format();

				if(!confirm("Esta seguro de cambiar la fecha del evento? ")){
					revertFunc();
				}else{
						$.post("<?php echo base_url(); ?>calendar/updEvento",
				{
					id:id,
					fechaIni:fi,
					fechaFin:ff,
				}, 
				function(data){
					if(data == 1){
						alert("Se actualizo el evento correctamente");	
					}else{
						alert("ERROR");	
					}

				});
				}
			

			},
			/* eventClick: function(event, jsEvent, view){
			 		$('#calendar').fullCalendar( 'removeEvents', event.id);
			 	
			 }

*/



	eventRender: function(event, element) {
			       var el = element.html();
			       element.html("</div style='width:50%;float:left';>"+ el + "</div><div style='text-align:right;' class='close'>x</div>");

			       element.find('.close').click(function (){
			       	if(!confirm("Esta seguro de cambiar la fecha del evento? ")){
			       			revertFunc();
			       	}else{
			       		var id = event.id;
			       		$.post("<?php echo base_url(); ?>calendar/delEvento",
				{
					id:id,
				
				}, 
				function(data){
					if(data == 1){
						$('#calendar').fullCalendar( 'removeEvents', event.id);
						alert("Se elimino el evento correctamente");	
					}else{
						alert("ERROR");	
					}

				});
			       	
			       		}

			       });
        }

		});

			});
		
	
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>

</body>
</html>
