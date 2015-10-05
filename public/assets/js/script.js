$(document).ready(function(){
	$('#updateapartment-btn').click(function(){
		location.href="{!! URL::to('updateapartment') !!}";
	});
});