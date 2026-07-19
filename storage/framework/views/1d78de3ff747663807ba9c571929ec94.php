<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Track Package</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Tailwind CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

  <style>
    #map {
      height: 500px;
      width: 100%;
      border-radius: 0.5rem;
    }
  </style>
</head>
<body class="bg-white text-gray-800 font-sans leading-relaxed">

  <!-- Header -->
  <header class="bg-gray-900 text-white py-8 px-6 md:px-20">
    <div class="max-w-6xl mx-auto">
      <h1 class="text-3xl font-bold mb-1">📦 Package Tracking</h1>
      <p class="text-gray-300 text-sm">Real-time updates on your delivery status and current location</p>
    </div>
  </header>

  <!-- Main Content -->
  <section class="py-10 px-6 md:px-20">
    <div class="max-w-6xl mx-auto space-y-10">

      <!-- Tracking Info -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
        <div>
          <h2 class="text-2xl font-semibold mb-1">Tracking ID: 
            <span class="text-gray-700"><?php echo e($package->tracking_number); ?></span>
          </h2>
          
        </div>
        <span class="mt-4 md:mt-0 inline-block bg-yellow-100 text-black-800 px-4 py-1 rounded-full text-sm font-medium capitalize">
         Package Status:  <?php echo e($package->status); ?>

        </span>
      </div>

      <!-- Info Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 text-sm">
        <!-- Sender & Receiver -->
        <div class="space-y-6">
          <div>
            <h3 class="text-gray-600 font-semibold mb-1">Sender</h3>
            <p><strong>Name:</strong> <?php echo e($package->sendersname); ?></p>
            <p><strong>Email:</strong> <?php echo e($package->sendersemail); ?></p>
            <p><strong>Pickup Address:</strong> <?php echo e($package->pickup_address); ?></p>
          </div>
          <div>
            <h3 class="text-gray-600 font-semibold mb-1">Receiver</h3>
            <p><strong>Name:</strong> <?php echo e($package->recieversname); ?></p>
            <p><strong>Email:</strong> <?php echo e($package->recieversemail); ?></p>
            <p><strong>Phone:</strong> <?php echo e($package->recievers_phone); ?></p>
            <p><strong>Dropoff Address:</strong> <?php echo e($package->dropoff_address); ?></p>
          </div>
        </div>

        <!-- Shipment & Schedule -->
        <div class="space-y-6">
          <div>
            <h3 class="text-gray-600 font-semibold mb-1">Shipment Details</h3>
            <p><strong>Product:</strong> <?php echo e($package->product_name); ?></p>
            <p><strong>Weight:</strong> <?php echo e($package->weight); ?></p>
            <p><strong>Shipping Mode:</strong> <?php echo e($package->type_shipment); ?></p>
          </div>
          <div>
            <h3 class="text-gray-600 font-semibold mb-1">Schedule</h3>
            <p><strong>Pickup Date:</strong> <?php echo e(\Carbon\Carbon::parse($package->pickup_date)->format('F j, Y')); ?></p>
            <p><strong>Expected Delivery:</strong> <?php echo e(\Carbon\Carbon::parse($package->date)->format('F j, Y')); ?></p>
            <p><strong>Total Freight:</strong> <?php echo e($package->total_freight); ?></p>
          </div>
        </div>
      </div>

        <div id="map"></div>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css"/>

        <script>
        // Coordinates from Laravel
        var pickup = [<?php echo e($package->pickup_lat); ?>, <?php echo e($package->pickup_lng); ?>];
        var dropoff = [<?php echo e($package->dropoff_lat); ?>, <?php echo e($package->dropoff_lng); ?>];
        var current = [<?php echo e($package->current_lat); ?>, <?php echo e($package->current_lng); ?>];

        // Initialize map
        var map = L.map('map').setView(pickup, 6);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        // Add Pickup marker
        L.marker(pickup).addTo(map).bindPopup("<b>Pickup</b><br><?php echo e($package->pickup_address); ?>");

        // Add Drop-off marker
        L.marker(dropoff).addTo(map).bindPopup("<b>Drop-off</b><br><?php echo e($package->dropoff_address); ?>");

        // Add Current package marker
        L.marker(current, {icon: L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/679/679720.png', // package icon
            iconSize: [32, 32]
        })}).addTo(map).bindPopup("<b>Package Current Location</b>");

        // Draw route
        L.Routing.control({
            waypoints: [
                L.latLng(pickup[0], pickup[1]),
                L.latLng(dropoff[0], dropoff[1])
            ],
            createMarker: function() { return null; } // avoid duplicate markers
        }).addTo(map);
        </script>


      <!-- Map -->
      

    </div>
  </section>

  <!-- Leaflet JS -->
  
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '31dbe38323b6e8843d543aeaa958aaca98734b79';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>


</body>
</html>
<?php /**PATH /home/u461878610/domains/crossbordercargologistics.com/public_html/resources/views/Tracking/result.blade.php ENDPATH**/ ?>