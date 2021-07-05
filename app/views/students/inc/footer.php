
<div class="containe d-none">
  <div id="name-box" class="name-box">
    <h3>Enter your username</h3>
    <input id="name" type="text" placeholder="e.g. Mike">
    <button id="saveNameButton">Save</button>
  </div>

  <div id="delivery-hero-box" class="name-box hidden">
    <h3 id="welcome-message"></h3>
    <h4 id="delivery-heroes-list"></h4>
    <input id="deliveryHeroName" type="text" placeholder="e.g. Shelly">
    <button id="addDeliveryHeroButton">Add</button>
  </div>

  <div id="map"></div>
</div>

<script src="<?= URLROOT ?>/js/jquery.js"></script>
<script src="<?= URLROOT ?>/js/dashboard/links.js"></script>
<script src="<?= URLROOT ?>/js/accordion.js"></script>



<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVgfNr7f3vKGdY4bmGc6hJMqBM0MhfBL4"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDF17W43mzMp_WKspNwxMAZOW7zf_dejbc"></script>
<!-- <script type="text/javascript" src="<?php echo URLROOT; ?>/js/map/map.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo URLROOT; ?>/js/map/index.js"></script> -->
<script type="text/javascript" src="<?php echo URLROOT; ?>/js/map/main.js"></script>

<script type="text/javascript">
addLocation("<?= $_SESSION['user_name'] ?>")
</script>



</body>

</html>