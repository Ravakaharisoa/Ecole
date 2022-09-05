$(document).ready(function(){
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.datatables').DataTable({
    	language: {
            url: "assets/json/french.json"
        },
        processing: true,
    });

});