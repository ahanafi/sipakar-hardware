(function ($) {
	'use strict';
	$(function () {
		$('#order-listing').DataTable({
			"aLengthMenu": [
				[5, 10, 30, 50,  -1],
				[5, 10, 30, 50, "All"],
			],
			"iDisplayLength": 5,
			"bLengthChange": false,
			"language": {
				search: "Pencarian :"
			}
		});
		$('#order-listing').each(function () {
			let datatable = $(this);
			// SEARCH - Add the placeholder for Search and Turn this into in-line form control
			let search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
			search_input.attr('placeholder', 'Ketik disini');
			// search_input.removeClass('form-control-sm');
			//let s = datatable.closest('.dataTables_wrapper').find(".dataTables_filter").append(`<a href="${BASE_URL}${URI_1}/create" class="btn btn-primary ml-2">Tambah Data</a>`);
		});
	});
})(jQuery);
