<?php $__env->startSection('content'); ?>

<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">Create New Tracking</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12 col-lg-12">
               
               <div class="tab-content">
                  <div class="tab-pane active" id="overview" role="tabpanel">
                     <div class="card">
                        <div class="card-header">
                           <h5 class="card-title mb-0">Profile</h5>
                        </div>
                        <div class="card-body">
                           <div>
                              <div class="pb-3">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div>
                                          <?php if(session('success')): ?>
                                             <p style="color: green"><?php echo e(session('success')); ?></p>
                                          <?php endif; ?>
                                          <?php if($errors->any()): ?>
                                             <div class="alert alert-danger">
                                                <ul>
                                                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <li><?php echo e($error); ?></li>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                             </div>
                                          <?php endif; ?>
                                         <form action="<?php echo e(route('packages.store')); ?>" method="post">
                                             <?php echo csrf_field(); ?>

                                             <div class="row">
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label class="form-label">Sender's Name</label>
                                                         <input type="text" class="form-control" name="sendersname" value="<?php echo e(old('sendersname')); ?>">
                                                      </div>
                                                </div>
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label class="form-label">Sender's Email</label>
                                                         <input type="email" class="form-control" name="sendersemail" value="<?php echo e(old('sendersemail')); ?>">
                                                      </div>
                                                </div>
                                             </div>

                                             <div class="row">
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label class="form-label">Receiver's Name</label>
                                                         <input type="text" class="form-control" name="recieversname" value="<?php echo e(old('recieversname')); ?>">
                                                      </div>
                                                </div>
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label class="form-label">Receiver's Email</label>
                                                         <input type="email" class="form-control" name="recieversemail" value="<?php echo e(old('recieversemail')); ?>">
                                                      </div>
                                                </div>
                                             </div>

                                             <div class="row">
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label class="form-label">Receiver's Phone Number</label>
                                                         <input type="text" class="form-control" name="recievers_phone" value="<?php echo e(old('recievers_phone')); ?>">
                                                      </div>
                                                </div>
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label class="form-label">Weight of Goods</label>
                                                         <input type="text" class="form-control" name="weight" value="<?php echo e(old('weight')); ?>">
                                                      </div>
                                                </div>
                                             </div>

                                             <div class="row">
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label>Pickup Address</label>
                                                         <input type="text" name="pickup_address" class="form-control" value="<?php echo e(old('pickup_address')); ?>" required>
                                                         <br>
                                                         <label>Pickup Latitude</label>
                                                         <input type="number" name="pickup_lat" step="any" class="form-control" value="<?php echo e(old('pickup_lat')); ?>" required>
                                                         <br>
                                                         <label>Pickup Longitude</label>
                                                         <input type="number" name="pickup_lng" step="any" class="form-control" value="<?php echo e(old('pickup_lng')); ?>" required>
                                                      </div>
                                                </div>

                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label>Dropoff Address</label>
                                                         <input type="text" name="dropoff_address" class="form-control" value="<?php echo e(old('dropoff_address')); ?>" required>
                                                         <br>
                                                         <label>Dropoff Latitude</label>
                                                         <input type="number" name="dropoff_lat" step="any" class="form-control" value="<?php echo e(old('dropoff_lat')); ?>" required>
                                                         <br>
                                                         <label>Dropoff Longitude</label>
                                                         <input type="number" name="dropoff_lng" step="any" class="form-control" value="<?php echo e(old('dropoff_lng')); ?>" required>
                                                      </div>
                                                </div>
                                             </div>

                                             <div class="row">
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label>Expected Delivery Date</label>
                                                         <input type="date" class="form-control" name="date" value="<?php echo e(old('date')); ?>">
                                                      </div>
                                                </div>
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label>Pickup Date</label>
                                                         <input type="date" class="form-control" name="pickup_date" value="<?php echo e(old('pickup_date')); ?>">
                                                      </div>
                                                </div>
                                             </div>

                                             <div class="row">
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label>Type of Shipment</label>
                                                         <input type="text" class="form-control" name="type_shipment" value="<?php echo e(old('type_shipment')); ?>">
                                                      </div>
                                                </div>
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label>Product Name</label>
                                                         <input type="text" class="form-control" name="product_name" value="<?php echo e(old('product_name')); ?>">
                                                      </div>
                                                </div>
                                             </div>

                                             <div class="row">
                                                <div class="col-md-6">
                                                      <div class="mb-3">
                                                         <label>Total Freight</label>
                                                         <input type="text" class="form-control" name="total_freight" value="<?php echo e(old('total_freight')); ?>">
                                                      </div>
                                                </div>
                                             </div>

                                             <div class="mt-4">
                                                <button type="submit" class="btn btn-primary">Create Package</button>
                                             </div>
                                          </form>

                                       </div>
                                    </div>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u461878610/domains/crossbordercargologistics.com/public_html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>