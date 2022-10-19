
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
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                                    <h4 class="mb-0">Entrant Form</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="<?php echo e(url('dashboard/update',$theme->id)); ?>" method="POST" enctype="multipart/form-data" id="update_entrant_form">
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

                                                  <?php if(!empty($theme->themeImage)): ?>
                                                    <div class="form-group">
                                                        <label class="form-label" for=""></label>
                                                        <div class="form-control-wrap">
                                                            <img class="" src="<?php echo e(url('storage/app/public',$theme->themeImage->image)); ?>" alt="" width="80" height="80">
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
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
                                                            <textarea class="form-control" aria-label="With textarea" name="description"><?php echo e($theme->description); ?></textarea>      
                                                    </div>
                                                    <?php $__errorArgs = ['description'];
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
                                                <div class="mb-3">
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </div>
                                        </form>
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
$("#theme_id option[value='<?php echo e($theme->theme); ?>']").prop('selected', true);
    var image  = $('input[name="image[]"]').val();

        $("#update_entrant_form").validate({
            errorClass: "invalid",
            errorElement: "span",
            rules: {
                theme: {
                    required: true
                },
                'image[]': {
                    required: $.trim(image)!="" && $.trim(image)!="Null"?false:true,
                    accept: "image/png,image/jpg"
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


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gt-task\resources\views/dashboard/edit.blade.php ENDPATH**/ ?>