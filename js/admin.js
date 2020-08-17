jQuery(function($) {
	
	$("#rest-cache-tabs").tabs();
	
	$("button#add-rule").on("click", function(event) {
		
		var url = $("#rules [data-route]").attr("data-route");
		
		$.ajax(url, {
			method: "POST",
			success: function(response, status, xhr) {
				$("#rules table").DataTable().ajax.reload();
			}
		});
		
	});
	
});