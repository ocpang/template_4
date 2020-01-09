@extends('adminlte::page')


@section('content')
	<div class="row">
		<div class="col-md-12 rounded-top heading-wrapper">
			<div class="heading">
			     <i class="fa fa-circle heading-point"></i>&nbsp;&nbsp;{{$title_page}}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 rounded-bottom body-content-wrapper">
			<div class="row">
				<div class="col-auto ml-auto breadcrumb-wrapper">{{ Breadcrumbs::render('business') }}</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table datatable-with-search rounded-top" id="business-table">
				        <thead>
				            <tr>
				                <th class="disable-search">No.</th>
				                <th>Company</th>
				                <th>PIC Name</th>
				                <th>Company Address</th>
				                <th>Company Email</th>
				                <th>Company Phone</th>
				                <th class="multiselect-search">Active</th>
				                <th class="disable-search">Action</th>
				            </tr>
				            
				        </thead>
				    </table>
				</div>
			</div>
		</div>
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
	$(function() {
		// $('.dataTables_filter')
		

	    $('#business-table').DataTable({
	        processing: true,
	        serverSide: true,
	        "scrollX": true,
	        ajax: '{!! route('datatables.business') !!}',
	        columns: [
	            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
	            { data: 'company_name', name: 'company_name' },
	            { data: 'pic_name', name: 'pic_name' },
	            { data: 'company_address', name: 'company_address' },
	            { data: 'company_email', name: 'company_email' },
	            { data: 'company_phone', name: 'company_phone' },
	            { data: 'flag_active', name: 'flag_active' },
	            // { data: 'slug', name: 'slug' },
	            // { data: 'created_at', name: 'created_at' },
	            // { data: 'updated_at', name: 'updated_at' }
	        ],
	        "columnDefs": [
	            {
	                // The `data` parameter refers to the data for the cell (defined by the
	                // `data` option, which defaults to the column being worked with, in
	                // this case `data: 0`.
	                "render": function ( data, type, row ) {
	                    return '<a title="Edit" class="fa fa-edit" href="/smsnadyne/business/update/1"></a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick="activation(1,1)" class="fa fa-trash-alt " title="activate/deactivate"></a>';
	                },
	                "targets": 7,
	                orderable: false,
	                searchable: false
	            },
	            {
	                // The `data` parameter refers to the data for the cell (defined by the
	                // `data` option, which defaults to the column being worked with, in
	                // this case `data: 0`.
	                "render": function ( data, type, row ) {
	                	var icon = '';
	                	if(data == 1){
	                		icon = '<i class="fa fa-check"></i>'
	                	}else if(data == 0){
	                		icon = '<i class="fa fa-times"></i>'
	                	}
	                    return  icon;
	                },
	                "targets": 6
	            }
	        ],
	        initComplete: function() {
	        	//Add th for search box each column on myjs.js
				create_searchbox_head();
				$('.dataTables_filter input').attr('type', 'input');
				// $('.dataTables_scrollHead .datatable-with-search thead tr:nth-child(2) th select').addClass('form-control');
				$(this).dataTable().fnDraw(false); //refresh table width size

		    	var api = this.api();

		    	// Apply the search
		     	api.columns().every(function() {
		     		// console.log(this);
		     		index = this[0][0]+1;
		     		// console.log(index);
			        var that = this;
			        header_th = $('.dataTables_scrollHead .datatable-with-search thead tr:nth-child(2) th:nth-child('+index+')');
			        $('input', header_th).on('keyup change', function() {
			        	console.log('dd')
			          if (that.search() !== this.value) {
			            that
			              .search(this.value)
			              .draw();
			          }
			    	});

			    	$('select', header_th).on('change', function() {
	          			var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        that
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
			    	});

			    	multiselectSearch = $('.dataTables_scrollHead .datatable-with-search thead tr:first-child th:nth-child('+(index)+')').hasClass('multiselect-search');
			    	if(multiselectSearch){
			    		title = $('.dataTables_scrollHead .datatable-with-search thead tr:first-child th:nth-child('+(index)+')').html();
				    	that.data().unique().sort().each( function ( d, j ) {
				    		if(title == 'Active'){
				    			if(d==0)
				    				vname = 'Deactive';
				    			else if(d==1)
				    				vname = 'Active';
				    		}else{
				    			vname = d;
				    		}
		                    $('select', header_th).append( '<option value="'+d+'">'+vname+'</option>' )
		                });
				    }

		    	});	
				
				
		    }		
	    });

	    

	});
</script>
@stop
@push('scripts')

@endpush