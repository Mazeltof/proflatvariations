// Select colors
$("[data-colorselect]").each(function() {
	var sushicouleur = $(this).data("colorselect");
	$(this).on("click", function() {
		$("html").attr("data-color", sushicouleur);
		localStorage.setItem("proflat_dark_side_variations", sushicouleur);
	});	
});