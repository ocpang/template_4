function create_searchbox_head (argument) {
	// body...
	var th_text = '';
	$('.dataTables_scrollHead .datatable-with-search thead tr th').each(function (argument) {
		// $('#business-table thead tr:nth-child(2)').append('<th></th>');
		th_text = th_text+'<th></th>';
		// console.log('ss');
	})
	$('.dataTables_scrollHead .datatable-with-search thead').append('<tr>'+th_text+'</tr>');

	$('.dataTables_scrollHead .datatable-with-search thead tr:nth-child(2) th').each(function(index) {
	    var title = $('.dataTables_scrollHead .datatable-with-search thead tr:first-child th:nth-child('+(index+1)+')').text();
	    var th_search_empty = $('.dataTables_scrollHead .datatable-with-search thead tr:nth-child(2) th:nth-child('+(index+1)+')').is(':empty');
	    // console.log($('.dataTables_scrollHead .datatable-with-search thead tr:nth-child(2) th:nth-child('+(index+1)+')').html())
	    // console.log(th_search_empty)
	    disableSearch = $('.dataTables_scrollHead .datatable-with-search thead tr:first-child th:nth-child('+(index+1)+')').hasClass('disable-search');
	    multiselectSearch = $('.dataTables_scrollHead .datatable-with-search thead tr:first-child th:nth-child('+(index+1)+')').hasClass('multiselect-search');
	    if(!disableSearch){
		    // $(this).html('<input type="text" placeholder="Search ' + title + '" />');
		    if(multiselectSearch){
		    	$(this).html('<select><option value="">-Select-</option></select>');
		    }else{
			    $(this).html('<input type="text" placeholder="Search" />');
			}
		}

	  });
}