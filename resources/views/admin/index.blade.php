@extends('layouts.app')
@section('content')
<style type="text/css">
    .modal-dialog {
        max-width: 750px !important;
    }
</style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

                <!-- ============================================================== -->
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <div class="main-content">

                    <div class="page-content">
                        <div class="container-fluid">

                            <!-- start page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                                <h4 class="mb-0">EXPORT BEST SHOT</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">                                           
                                            <div class="row mb-2">
                                                <div class="col-sm-4">                                                    
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="text-sm-end">
                                                        <a href="{{ url('admin/export-user') }}"><button type="button" class="btn btn-success waves-effect waves-light mb-2"><i class="mdi mdi-plus me-1"></i>Export Best Shot</button></a>
                                                    </div>
                                                </div><!-- end col-->
                                            </div>
                    
                                            <div class="table-responsive">
                                                <table class="ui celled table" data-toggle="datatable" id="myTable">
                                                    <thead class="table-light">
                                                        <tr>
                                                        <th>ID</th>
                                                        <th>User Name</th>
                                                        <th>User Email</th>
                                                        <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                                                 
                                                    </tbody>                                                    
                                                </table>
                                            </div>                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div> <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->

    <div class="modal fade" id="show-shots" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true" data-backdrop="static">
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
                                <th><span class="th-header">Theme</span></th>
                                <th><span class="th-header">Image</span></th>
                                <th><span class="th-header">Brief Description</span></th>
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
    </div>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript">
        $(document).on('change','.date-range-filter',function(){
        $("#myTable").DataTable().clear().destroy();
        dataTable();
    });
  
       $(function dataTable(){
        $.fn.dataTable.ext.errMode = () => alert('Error while loading the table data. Please refresh the page');
        var table = $("#myTable").dataTable({
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
            ajax:"{{ url('admin/index') }}",
            "order":[
            [0,"asc"]
            ],
            "columns":[
            {
                "targets":-1,
                "mData":"id",
                "bSortable": false,
                "filter":true,
                "mRender":function(data, type, row){
                    return '<div>'+row.id+'</div>';
                },
            },
            {
                "targets":-1,
                "mData":"name",
                "bSortable": false,
                "filter":false,
                "mRender":function(data, type, row){
                    return '<div>'+row.name+'</div>';
                },
            },
            {
                "targets":-1,
                "mData":"email",
                "bSortable": false,
                "filter":true,
                "mRender":function(data, type, row){
                    return '<div>'+row.email+'</div>';
                },
            },
             {
                "targets":-1,
                "mData":"",
                "bSortable": false,
                "filter":false,
                "mRender":function(data, type, row){
                    return '<div><a href="javascript:void(0)" class="btn btn-dim  btn-outline-success" onclick="openModal('+row.id+')" data-toggle="modal" data-target="#show-shots"><em class="fas fa-eye"></em></a></div>';
                },
            }]
        });
        
    });

    function openModal(id){
        $("#shots-datatable").DataTable().clear().destroy();        
        $('#show-shots').modal("show");
        dataTableShot(id);

    }

    $(".close").click(function(){
        $('#show-shots').modal("hide");
    })
   

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
            ajax:"{{ url('admin/getShots') }}?&id="+id,
            "order":[
            [0,"asc"]
            ],
            "columns":[           
            {
                "targets":-1,
                "mData":"theme",
                "bSortable": false,
                "filter":false,
                "mRender":function(data, type, row){
                    return '<div>'+row.theme+'</div>';
                },
            },
            {
                "targets":-1,
                "mData":"name",
                "bSortable": false,
                "filter":false,
                "mRender":function(data, type, row){
                    if(row.themeImage != null){
                        return '<div>'+row.themeImage.image+'</div>';
                    }else{
                         return '<div>--</div>';
                    }
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
