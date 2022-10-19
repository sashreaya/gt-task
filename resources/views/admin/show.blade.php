@section('show')
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content product__category__table__popup">
     <div class="modal-header">
        <h5 class="modal-title" id="modal-title-default">Best Shots</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
     </div>
    <div class="modal-body">            
           <!-- <div class="row"> -->
          <div class="card-body">
            <table id="shots-datatable" class="ui celled table" data-toggle="datatable" >
                <thead>
                    <tr>
                        <th width="25%"><span class="th-header">Theme</span></th>
                        <th width="25%"><span class="th-header">Image</span></th>
                        <th width="25%"><span class="th-header">Brief Description</span></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        <!-- </div>  -->
       </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function dataTableShot(id){
      $.fn.dataTable.ext.errMode = () => alert('Error while loading the table data. Please refresh the page');
        var table = $("#shots-datatable").dataTable({
            language: {
                search: "<div id='datatable_filter' class='dataTables_filter show'><label><div class='input-icons'><input type='hidden' class='input-field' placeholder='Search Records' aria-controls='datatable'><i class='fas fa-search icon' style='margin-left: 220px; position:relative;'></i></div></label></div>",
                searchPlaceholder: "Search Records",
                paginate: {
                    previous: "<i class='fas fa-angle-left' style='color:#ccc;'></i>",
                    next: "<i class='fas fa-angle-right' style='color:#ccc;'></i>"
                },
            },
            responsive: !0,
            autoFill: !0,
            keys: !0,
            lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
            ],
            "processing": true,
            oLanguage: {sProcessing: "<div id='datatable-loader'></div>"},
            "serverSide": true,
            ajax:"{{ url('admin/getShots') }}/"+id,
            "order":[
            [0,"asc"]
            ],
            "columns":[           
            {
                "targets":-1,
                "mData":"name",
                "bSortable": false,
                "filter":false,
                "mRender":function(data, type, row){
                    return '<div>'+row.theme+'</div>';
                },
            },
            {
                "targets":-1,
                "mData":"email",
                "bSortable": false,
                "filter":false,
                "mRender":function(data, type, row){
                    return '<div>'+row.image+'</div>';
                },
            },
            {
                "targets":-1,
                "mData":"email",
                "bSortable": false,
                "filter":false,
                "mRender":function(data, type, row){
                    return '<div>'+row.description+'</div>';
                },
            
            }]
        });
        }   
  </script>
@endsection