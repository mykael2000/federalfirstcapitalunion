<?php $__env->startSection('title', 'Account Details'); ?>


<?php $__env->startSection('content'); ?>

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Account Profile</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?php echo e(route('user.account-security')); ?>" class="btn btn-primary-rgba"><i class="feather icon-eye mr-2"></i>Change Password</a>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->

<!-- START: Main Content-->
    <div class="contentbar">
        <!-- START: Card Data-->
        <div class="row">

        <?php if($success = session('success')): ?>
            <div class="col-12 col-lg-12 mt-2">
                <div class="alert alert-success"><?php echo e($success); ?></div>
            </div>
        <?php endif; ?>

        <div class="col-12 col-lg-5 mt-3">
            <div class="card m-b-30">
                <div class="card-header text-center">  
                    <h5 class="card-title mb-0">Picture Identification</h5>
                </div>
                <div class="card-body p-0">
                    <div class="img-card w-50 m-auto">
                        <?php if(empty($user->profile)): ?>
                        <img src="<?php echo e(asset('img/488px-No-Image-Placeholder.svg.png')); ?>" class="w-100 img-thumbnail">
                        <?php else: ?>
                        <img src="/app<?php echo e($user->profile); ?>" class="w-100 img-thumbnail">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer mt-3">
                    <div class="border-bottom pb-3 pl-2"><strong>Account Information</strong></div>
                    <p class="p-2"><strong>Full name:</strong> <?php echo e(ucwords($user->first_name.' '.$user->last_name)); ?></p>
                    <p class="p-2"><strong>Account Username:</strong> <?php echo e(ucwords($user->username)); ?></p>
                    <p class="p-2"><strong>Age:</strong> <?php echo e($user->age); ?></p>
                    <p class="p-2"><strong>Email:</strong> <?php echo e($user->email); ?></p>
                    <p class="p-2"><strong>Phone:</strong> <?php echo e($user->phone); ?></p>
                    <p class="p-2"><strong>Home Address:</strong> <?php echo e($user->address); ?></p>
                </div>
            </div>   
        </div>

        <div class="col-12 col-lg-7 mt-3">
            <div class="card m-b-50">
                <div class="card-header">                               
                    <h4 class="card-title">Edit Account Information</h4>                                
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">                                           
                            <div class="col-12">
                                <form action="<?php echo e(route('user.account-setting.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="first_name">First name</label>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="icon-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="First name" name="first_name" value="<?php echo e($user->first_name); ?>">
                                                
                                            </div>
                                            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name">Last name</label>
                                            <div class="input-group  mb-3">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="icon-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="<?php echo e($user->last_name); ?>">
                                                
                                            </div>
                                            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <div class="input-group  mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="icon-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Username" value="<?php echo e($user->username); ?>" name="username">
                                            
                                        </div>
                                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            
                                            <label for="email">Email</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-email"><i class="icon-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo e($user->email); ?>">
                                            </div>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </div>

                                        <div class="col-md-6">
                                            
                                            <label for="phone">Phone</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-email"><i class="icon-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter phone" name="phone" value="<?php echo e($user->phone); ?>">
                                                
                                            </div>
                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </div>

                                    </div>


                                    <div class="row">

                                        <div class="col-md-8">
                                            <label for="address">Home address</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="icon-home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter home address" name="address" value="<?php echo e($user->address); ?>">
                                                
                                            </div>
                                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="age">AGE</label>

                                            <div class="input-group mb-3">
                                                
                                                <input type="number" class="form-control" name="age" value="<?php echo e($user->age); ?>">
                                                
                                            </div>
                                            <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        </div>
        <!-- END: Card DATA-->
    </div>
<!-- END: Content-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/federalfirstcapitalunion.com/public_html/obn/resources/views/user/account/profile.blade.php ENDPATH**/ ?>