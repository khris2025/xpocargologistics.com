<?php $__env->startSection('content'); ?>
    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <script>
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: <?php echo json_encode($message, 15, 512) ?>,
            });
        </script>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php if(session('success')): ?>
        <script>
            Swal.fire({
            icon: 'success',
            title: 'Success',
            text: <?php echo json_encode(session('success'), 15, 512) ?>,
            });
        </script>
    <?php endif; ?>
    <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-xl-10">
        <div class="card rounded-3 text-black">
        <div class="row g-0">
            <div class="col-lg-6">
            <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                <!--<img src="<?php echo e(asset('assets/images/bit-blockdigital_images/logomain.png')); ?>"-->
                <!--    style="width: 185px;" alt="logo">-->
                
                </div>
                
                <form action="<?php echo e(route('admin.register.submit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <p>Please Create your Account</p>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if(request()->has('ref')): ?>
                    <input type="hidden" name="ref" value="<?php echo e(request()->query('ref')); ?>">
                <?php endif; ?>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Name</label>
                    <input type="text" id="form2Example11" class="form-control" name="name"
                    placeholder="" value="<?php echo e(old('name')); ?> "/>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Email</label>
                    <input type="email" id="form2Example22" name="email" class="form-control" value="<?php echo e(old('email')); ?>"/>
                </div>

               

                
               

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" />
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePasswordVisibility('password')">
                                <i class="fa fa-eye" id="togglePasswordIcon"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePasswordVisibility('password_confirmation')">
                                <i class="fa fa-eye" id="toggleConfirmPasswordIcon"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <script>
                    function togglePasswordVisibility(fieldId) {
                        const field = document.getElementById(fieldId);
                        const icon = field.nextElementSibling.querySelector('i');
                        if (field.type === 'password') {
                            field.type = 'text';
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                        } else {
                            field.type = 'password';
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                        }
                    }
                </script>
                <input type="submit" value="Get Started" class="btn btn-outline-danger">
                <hr>

                <a class="text-muted" href="login">Already have an account? Click Me</a>
             



                

                
               




                </form>

            </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('unauth.layouts.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/gibsonjohn/Desktop/tracking/resources/views/unauth/register.blade.php ENDPATH**/ ?>