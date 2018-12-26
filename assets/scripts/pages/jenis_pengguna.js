$(function () {
	$("table").on("click", ".edit", function () {
		var id = $(this).attr("data-id");
		
		if(id) {
			$.ajax({
				url: site_url + 'jenis_pengguna/view/' + id,
				dataType: 'json',
				success: function (response) {
					$("#id").val(id);
					$("#id_jenis_pengguna").val(id);
					$("#jenis_pengguna").val(response.jenis_pengguna);
					
					$("#form").attr("action", site_url + "jenis_pengguna/update");
				}
			});
		}
		else
			return;
	});
});