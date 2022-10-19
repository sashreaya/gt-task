
<?php $__env->startSection('content'); ?> 

<style type="text/css">
    .imgPreview{
        width: 200px;
        height: 150px;
        margin-right: 20px;
        margin-top: 20px;
        overflow: hidden;
    }

    .instructions{
        background-color: skyblue;
        padding: 5px;
        color: white;
    }
</style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">  
                        <div class="row">
                            <div class="col-12">
                                <div class="card">                                    
                                    <div class="card-body">
                                            <div class="instructions"><b>Contest Guidelines</b></div>
                                                <ul>
                                                    <li> Each entrant can submit up to five images. Judging will be based on a single image and not the series of images.</li>
                                                    <li> The entry should be based on the theme mentioned.</li>
                                                    <li> Image format should be JPG/PNG.</li>
                                                    <li> Image can be vertical, horizontal, panorama or square.</li>
                                                    <li> Cropped photographs are eligible. Minor adjustments, including spotting, dodging, burning, sharpening, contrast and slight colour adjustment or the digital equivalents are acceptable. If the judge determines that an entrant has altered his/her photograph, they reserve the right to disqualify it.</li>
                                                    <li> Participants can be asked to submit the original, raw/unedited digital file.</li>
                                                </ul>
                                            <div class="instructions"><b>Selection criteria</b></div>
                                                <ul>
                                                     <li> Entries submitted will be judged based on the composition, exposure, lighting, creativity, visual impact, originality and the overall visual quality.</li>
                                                </ul>
                                             <div class="instructions"><b>Terms and conditions</b></div>
                                                <ul>
                                                    <li>  By entering the contest, the entrant agrees to all the terms and conditions of the contest.</li>
                                                    <li>  The entrant acknowledges and warrants that the submitted photograph is an original work created solely by himself/herself, that the photograph does not infringe on the copyrights, trademarks, moral rights, rights of privacy/publicity or intellectual property rights of any person or entity, and that no other party has any right, title, claim, or interest in the photograph.</li>
                                                    <li>  The entrant accepts that he/she is the sole copyright owner of the photograph submitted.</li>
                                                    <li>  By participating in the contest, the entrant accepts that the Firm reserves the right to use his/her submission for any official use/promotions</li>
                                                    <li> Photographs that contain obscene, violent or other objectionable or inappropriate content will be considered ineligible in this contest.</li>
                                                </ul> 
                                                <br><br>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="page-title-box d-flex align-items-center justify-content-between">
                                                        <h4 class="mb-0">Entrant Form</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="<?php echo e(url('dashboard/store')); ?>" method="POST" enctype="multipart/form-data" id="entrant_form">
                                                <?php echo csrf_field(); ?>
                                                <div class="col-6 mb-3">
                                                    <label class="form-label" for="default-input">Theme</label>
                                                    <select class="form-control" name="theme" id="theme_id">
                                                       <option value="">---Select Theme----</option>
                                                       <option value="Travel Memories">Travel Memories</option>
                                                       <option value="College Memories">College Memories</option>
                                                       <option value="istorical Place Memories">Historical Place Memories</option>
                                                    </select>
                                                        <?php $__errorArgs = ['theme'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label class="form-label" for="photo">Photos</label>
                                                        <input class="form-control" type="file" id="photo" name="image[]" multiple="multiple">
                                                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid" role="alert">
                                                                <strong><?php echo e($message); ?></strong>
                                                            </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="image" style="margin-bottom: 10px;">   
                                                    </div>
                                                   
                                                    <div class="col-6 mb-3">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" style="padding: 20px;">Brief description about your shot</span>
                                                            </div>
                                                                <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="description" role="alert">
                                                                    <strong><?php echo e($message); ?></strong>
                                                                </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <button class="btn btn-primary" type="submit">Save</button>
                                                    </div>
                                            </form>
                                             <div class="table-responsive">
                                                <table class="table align-middle table-nowrap table-check" id="datatable">
                                                    <thead class="table-light">
                                                        <tr>
                                                          <tr>
                                                            <th><span class="th-header">Theme</span></th>
                                                            <th><span class="th-header">Image</span></th>
                                                            <th><span class="th-header">Brief Description</span></th>
                                                            <th><span class="th-header">Action</span></th>
                                                        </tr>
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
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
            </div>
            <!-- end main content-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function() {

     $("#datatable").DataTable().clear().destroy();
        dataTableShot();

    var image  = $('input[name="image"]').val();

        $("#entrant_form").validate({
            errorClass: "invalid",
            errorElement: "span",
            rules: {
                theme: {
                    required: true
                },
                'image[]': {
                    required: $.trim(image)!="" && $.trim(image)!="Null"?false:true,
                    accept: "image/png, image/jpg"
                },
                description:{
                    required: true
                }
            },
            messages: {
                theme: {
                    required: "Theme field is required"
                },
               
                'image[]': {
                    required:"Image field is required.",
                    accept: "Image field should be in jpg|jpeg|png image file format"
                },
                description:{
                    required:"Description field is required"
                }
            },           
            submitHandler: function (form) {

                form.submit();
            }
        });
    });

$(function() {
    // Multiple images preview in browser
   var  k=1;
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    k++;
                    $($.parseHTML('<img class="imgPreview" id="preview'+k+'"><div><button type="button" id="previewBtn'+k+'" class="btn btn-primary" onclick="deleteImage('+k+')">Delete</button></div>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                if(k==6){
                    alert('cant upload more than 5 image');
                }
                reader.readAsDataURL(input.files[i]);              
            }
        }

    };

    $('#photo').on('change', function() {
        imagesPreview(this, 'div.image');
    });
});

 // clear the file list when image is clicked
    function deleteImage(id){ 
        $('#photo').val("");
        $('#previewBtn'+id).remove();
        $('#preview'+id).remove();
    }

     function dataTableShot(){
        let id = <?php echo json_encode($user_id); ?>;
            $.fn.dataTable.ext.errMode = () => alert('Error while loading the table data. Please refresh the page');
            var table = $("#datatable").dataTable({
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
            ajax:"<?php echo e(url('dashboard/index')); ?>?&id="+id,
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
                "mData":"name",
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
            }, 
            {
                "targets":-1,
                "mData":"",
                "bSortable": false,
                "filter":false,
                "mRender":function(data, type, row){
                    return '<div>'+row.action+'</div>';
                },
            
            }]
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gt-task\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>