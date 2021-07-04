<?php require APPROOT . '/views/map/inc/header.php'; ?>

<main class="container">
      <div id="map" class="map"></div>
      <p id="info" class="info"></p>
    </main>


    <script src="<?php echo URLROOT; ?>/js/map/normal.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVgfNr7f3vKGdY4bmGc6hJMqBM0MhfBL4&callback=init"></script>
<?php 
// require APPROOT . '/views/map/inc/footer.php'; ?>