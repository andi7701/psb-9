$(function () {
	$("table").on("click", ".edit", function () {
		var id = $(this).attr("data-id");
		
		if(id) {
			$.ajax({
				url: site_url + 'unit_kerja/view/' + id,
				dataType: 'json',
				success: function (response) {
					$("#id").val(id);
					$("#id_unit_kerja").val(id);
					$("#unit_kerja").val(response.unit_kerja);
					
					$("#form").attr("action", site_url + "unit_kerja/update");
				}
			});
		}
		else
			return;
	});
});