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
<style>
   #map {
   height: 400px;
   width: 100%;
   border-radius: 0.5rem;
   margin-top: 1rem;
   margin-bottom: 1rem;
   }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.min.js"></script>
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0 font-size-18">Edit Tracking Package</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Edit Package</li>
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
                           <h5 class="card-title mb-0">Edit Package</h5>
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
                                          <form action="<?php echo e(route('updatePackage', $package->id)); ?>" method="POST">
                                            <?php echo method_field('PUT'); ?>
                                             <?php echo csrf_field(); ?>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Sender's Name</label>
                                                      <input type="text" class="form-control" name="sendersname" value="<?php echo e(old('sendersname', $package->sendersname)); ?>">
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Sender's Email</label>
                                                      <input type="email" class="form-control" name="sendersemail" value="<?php echo e(old('sendersemail', $package->sendersemail)); ?>">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Receiver's Name</label>
                                                      <input type="text" class="form-control" name="recieversname" value="<?php echo e(old('recieversname', $package->recieversname)); ?>">
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Receiver's Email</label>
                                                      <input type="email" class="form-control" name="recieversemail" value="<?php echo e(old('recieversemail', $package->recieversemail)); ?>">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Receiver's Phone Number</label>
                                                      <input type="text" class="form-control" name="recievers_phone" value="<?php echo e(old('recievers_phone', $package->recievers_phone)); ?>">
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Weight of Goods</label>
                                                      <input type="text" class="form-control" name="weight" value="<?php echo e(old('weight', $package->weight)); ?>">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Pickup Location</label>
                                                      <input type="hidden" id="pickup_lat" name="pickup_lat" value="<?php echo e(old('pickup_lat', $package->pickup_lat)); ?>">
                                                      <input type="hidden" id="pickup_lng" name="pickup_lng" value="<?php echo e(old('pickup_lng', $package->pickup_lng)); ?>">
                                                      <input type="text" class="form-control" name="pickup_address" value="<?php echo e(old('pickup_address', $package->pickup_address)); ?>">
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Delivery Location</label>
                                                      <input type="hidden" id="dropoff_lat" name="dropoff_lat" value="<?php echo e(old('dropoff_lat', $package->dropoff_lat)); ?>">
                                                      <input type="hidden" id="dropoff_lng" name="dropoff_lng" value="<?php echo e(old('dropoff_lng', $package->dropoff_lng)); ?>">
                                                      <input type="text" class="form-control" name="dropoff_address" value="<?php echo e(old('dropoff_address', $package->dropoff_address)); ?>">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Expected Delivery Date</label>
                                                      <input type="date" class="form-control" name="date" value="<?php echo e(old('date', $package->date)); ?>">
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Pickup Date</label>
                                                      <input type="date" class="form-control" name="pickup_date" value="<?php echo e(old('pickup_date', $package->pickup_date)); ?>">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Type of Shipment</label>
                                                      <input type="text" class="form-control" name="type_shipment" value="<?php echo e(old('type_shipment', $package->type_shipment)); ?>">
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Product Name</label>
                                                      <input type="text" class="form-control" name="product_name" value="<?php echo e(old('product_name', $package->product_name)); ?>">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Total Freight</label>
                                                      <input type="text" class="form-control" name="total_freight" value="<?php echo e(old('total_freight', $package->total_freight)); ?>">
                                                   </div>
                                                   
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="mb-3">
                                                      <label class="form-label">Status</label>
                                                      <input type="text" class="form-control" name="status" value="<?php echo e(old('status', $package->status)); ?>">
                                                   </div>
                                                   
                                                </div>

                                               
                                             </div>
                                             <div class="mt-4">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update Package</button>
                                             </div>
                                          </form>
                                       </div>



                                       
                                        <form action="<?php echo e(route('update.map', $package->id)); ?>" method="POST">
                                          <?php echo csrf_field(); ?>
                                          
                                          <input type="hidden" id="current_lat" name="current_lat" value="<?php echo e($package->current_lat); ?>">
                                          <input type="hidden" id="current_lng" name="current_lng" value="<?php echo e($package->current_lng); ?>">
                                          <div id="map"></div>
                                          <br>
                                          <button type="submit" class="btn btn-primary waves-effect waves-light">Update Map</button>
                                        </form>
                                       <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                                       <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.min.js"></script>
                                       <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css"/>
                                       <script>
                                          // Coordinates from Laravel
                                          var pickup = [<?php echo e($package->pickup_lat); ?>, <?php echo e($package->pickup_lng); ?>];
                                          var dropoff = [<?php echo e($package->dropoff_lat); ?>, <?php echo e($package->dropoff_lng); ?>];
                                          var current = [<?php echo e($package->current_lat); ?>, <?php echo e($package->current_lng); ?>];
                                          
                                          // Initialize map
                                          var map = L.map('map').setView(current, 5);
                                          
                                          // Add tiles
                                          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                                          
                                          // Pickup marker (locked)
                                          L.marker(pickup).addTo(map).bindPopup("Pickup");
                                          
                                          // Drop-off marker (locked)
                                          L.marker(dropoff).addTo(map).bindPopup("Drop-off");
                                          
                                          // Current location marker (draggable)
                                          var currentMarker = L.marker(current, {draggable: true}).addTo(map).bindPopup("Current Location");
                                          
                                          // Update hidden fields when marker is dragged
                                          currentMarker.on('dragend', function() {
                                              var pos = currentMarker.getLatLng();
                                              document.getElementById('current_lat').value = pos.lat;
                                              document.getElementById('current_lng').value = pos.lng;
                                          });
                                          
                                          // Draw route between pickup and dropoff
                                          L.Routing.control({
                                              waypoints: [
                                                  L.latLng(pickup[0], pickup[1]),
                                                  L.latLng(dropoff[0], dropoff[1])
                                              ],
                                              createMarker: function() { return null; }
                                          }).addTo(map);
                                       </script>
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
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u461878610/domains/crossbordercargologistics.com/public_html/resources/views/admin/editPackage.blade.php ENDPATH**/ ?>