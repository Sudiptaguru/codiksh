
<?php $__env->startSection('content'); ?>
<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Company and Employee Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('employees.index')); ?>" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
   
  <?php if(session('status')): ?>
    <div class="alert alert-success mb-1 mt-1">
        <?php echo e(session('status')); ?>

    </div>
  <?php endif; ?>
  
  <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <form action="<?php echo e(route('employees.update',$employee->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
   
        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    <input type="text" name="company_name" value="<?php echo e($employee->company_name); ?>" class="form-control" placeholder="Company Name">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Email:</strong>
                    <input type="text" name="company_email" value="<?php echo e($employee->company_email); ?>" class="form-control" placeholder="Company Name">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Logo:</strong>
                    <input type="file" name="logo" class="form-control" placeholder="Logo">
                    <img src="../../image/<?php echo e($employee->logo); ?>" width="300px">
                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Website:</strong>
                    <input type="text" name="website" value="<?php echo e($employee->website); ?>" class="form-control" placeholder="Company Name">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" value="<?php echo e($employee->first_name); ?>" class="form-control" placeholder="Company Name">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" value="<?php echo e($employee->last_name); ?>" class="form-control" placeholder="Company Name">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Employee Email:</strong>
                    <input type="text" name="employee_email" value="<?php echo e($employee->employee_email); ?>" class="form-control" placeholder="Employee Email">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" value="<?php echo e($employee->phone); ?>" class="form-control" placeholder="Employee Phone">
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Id:</strong>
                    <input type="text" name="company_id" value="<?php echo e($employee->company_id); ?>" class="form-control" placeholder="Company Id">
                    
                </div>
            </div>
            

              <button type="submit" class="btn btn-primary ml-3">Submit</button>
          
        </div>
   
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codiksh\resources\views/employees/edit.blade.php ENDPATH**/ ?>