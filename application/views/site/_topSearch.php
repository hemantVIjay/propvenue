<link href="<?= base_url(); ?>assets/plugins/jqueryui/css/jquery-ui.css" rel="stylesheet">
<script src="<?= base_url(); ?>assets/plugins/jqueryui/js/jquery-ui.js"></script>
<div class="input-group gblsrh">	
   <input type="text" class="form-control form-control-lg autocomplete" placeholder="Search your property here..." name="i_search" autocomplete="off">
   <button class="btn btn-lg btn-primary" type="button" id="imain_search"><i class="bi bi-search"></i></button>   		   
</div>
<input type="hidden" id="search" name="content">	 	
<script>
var baseUrl = $('base').attr("href");
$(function () {
	$(".autocomplete").autocomplete({
		source: function (request, response) {
			$.ajax({
				url: baseUrl + 'home/search_All',
				dataType: "json",
				data: {
					q: request.term
				},
				success: function (data) {
					response($.map(data, function (item) {
						return {
							label: item.name,
							desc: item.desc,
							val: item.val,
							slug: item.slug
						};
					}));
				}
			});
		},
		minLength: 0,
		select: function (event, ui) {
			var content = btoa(ui.item.val);
			var slug = ui.item.slug;
			$('#search').attr('data-slug', '');
			$('#search').val('');
			$('#search').val(content);
			$('#search').attr('data-slug', slug);
		}
	}).autocomplete("instance")._renderItem = function (ul, item) {
		return $("<li>")
			.append("<div>" + item.label + "<span class='suggests'>" + item.desc + "</span></div>")
			.appendTo(ul);
	};
	$('#imain_search').on('click', function () {
		search_properties();
	});
});

function search_properties() {

	var main = $('select[name="cities"]').val();
	var type = $('input[name="type"]:checked').val();
	var search = $('input[name="content"]').data('slug');
	var content = $('input[name="content"]').val();
	var str = atob(content);
	var res = str.split('_');
	if (res[0] == 'LOC') {
		var mainURL = baseUrl + 'search/properties/';
		if (type == undefined) {
			type = '';
		}
		if (search == undefined) {
			search = '';
		}
		if (content == undefined) {
			content = '';
		}
		window.location.href = mainURL + main + '?location=' + search + '&type=' + type + '&content=' + content;
	}
	if (res[0] == 'PROJ') {
		var mainURL = baseUrl + search;
		window.location.href = mainURL;
	}
	if (res[0] == 'BLD') {
		var mainURL = baseUrl + search;
		window.location.href = mainURL;
	}
	if (res[0] == 'CITY') {
		var mainURL = baseUrl + search;
		window.location.href = mainURL;
	}
	if (content == '') {
		var mainURL = baseUrl + main;
		window.location.href = mainURL;
	}
}   
</script>