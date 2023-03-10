<?php $__env->startSection('content'); ?>

<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
<?php endif; ?>
    
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="<?php echo e(url('/')); ?>" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <a href="" class="kt-subheader__breadcrumbs-link">Assign Permission</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                   
                    <h3 class="kt-portlet__head-title">
                    Assign  Permission 
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

               



            <?php echo Form::open(array('route' => 'assign-permit.store','method'=>'POST')); ?>

<div class="row">


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Select Department:</strong>
            <select name="name" class="form-control kt-select2-2">
                <option value="">Select Department</option>
                <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
            </select>
     
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
             <small id="role-error" class="text-danger" for="role">Please Select Department</small>
           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
     
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Select Designation:</strong>
            <select id="designation" class="form-control kt-select2-2">
               <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($designations->id); ?>"><?php echo e($designations->designation_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="card">
          <?php $__errorArgs = ['permission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
             <small id="role-error" class="text-danger" for="role"><?php echo e($message); ?></small>
           <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="card-body">
        <strong>Permission:</strong>
          <table class="table table-bordered">
            <tr class="bg-primary">
                <th>Resource Name</th>
                <th>List</th>
                <th>Create</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
               <?php $__currentLoopData = $resourcePermission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($value->resource); ?>


                         <?php 
                           $data_sub=DB::table('permissions')->where('resource',$value->resource)->where('parent_id','!=',0)->get();
                         ?> 

                       <?php if($data_sub->count()>0): ?>
										        <ul>
                              <?php $__currentLoopData = $data_sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li style="list-style:none"><?php echo e(Form::checkbox('permission[]', $sub->id, false, array('class' => 'name'))); ?> <?php echo e($sub->name); ?> </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </ul>
                       <?php endif; ?> 
                    </td>
                    <?php 
                      $data=DB::table('permissions')->where('resource',$value->resource)->where('parent_id',0)->get();
                    ?> 
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <td><?php echo e(Form::checkbox('permission[]', $permit->id, false, array('class' => 'name'))); ?></td>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
      </div>
    </div>
 
    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
 
        <button type="reset" id="cancle" class="btn btn-danger btn-sm float-left">Cancel</button>

        <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save">

    </div>


 




</div>
<?php echo Form::close(); ?>












            </div>
        </div>
    </div>
<!-- end:: Content -->
</div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.enduser.dashboard.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/enduser/permission/assignPermission.blade.php ENDPATH**/ ?>