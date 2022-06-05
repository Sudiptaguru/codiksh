
<?php $__env->startSection('content'); ?>
<div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Company and Employee Details</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="<?php echo e(route('employees.create')); ?>"> Add New</a>
            </div>
        </div>
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
    <table class="table table-bordered">
        <tr>
            <th>S.No</th>
            <th>Logo</th>
            <th>Company Name</th>
            <th>Company's Email</th>
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($i1++); ?></td>
            
            <td><img src="image/<?php echo e($employee->logo); ?>" height="75" width="75" alt="" /></td>
            <td><?php echo e($employee->company_name); ?></td>
            <td><?php echo e($employee->company_email); ?></td>
            <td>
                <form action="<?php echo e(route('employees.destroy',$employee->id)); ?>" method="POST">
    
                    <a class="btn btn-primary" href="<?php echo e(route('employees.edit',$employee->id)); ?>">Edit</a>
   
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo $employees->links(); ?>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codiksh\resources\views/employees/index.blade.php ENDPATH**/ ?>