

//get the location ia Geoloion API

if ('geolocation' in  navigator) {
    var currentLocation = navigator.geolocation.getCurrentPosition(function(){
        map.setCenter({
            lat:position.coords.latitude,
            lng:position.coords.longitude,
        });
    });
}

var pusher = new Pusher('', {
    cluster:'',
    encrypted: true
})


function createMyLocationChannel(name) {
    var myLocationChannel = pusher.subscribe('private-' + name);
    myLocationChannel.bind('pusher:subscription_succeeded', function (params) {
        
        // safe to now trigger events
        // use the watchPosition API to watch the changing location
        // and trigger events with new coordinates

        locationWatcher=navigator.geolocation.watchPosition(function (position) {
            var location = {
                lat:position.coords.latitude,
                lng:position.coords.longitude
            };

            triggerLocationChangeEvents(myLocationChannel, location);
            
        });

        // also start a setInterval to keep sending the location every 5  secs
        sendLocationInterval=setInterval(function (params) {

            // not using `triggerLocationChangeEvents`  to keep the pipes different
            myLocationChannel.trigger('client-location', myLastKnownLocation)
        }, 5000);
    })

}


function addDeliveryHero(e) {
    var deliveryHeroName=deliveryHeroNameInput.value;

    //if already present return

    if(deliveryHeroesLocationMap[deliveryHeroName]) return;
    if (deliveryHeroName) {
        var deliveryHeroChannelName = 'private-'+deliveryHeroName;

        var deliveryHeroChannel=pusher.subscribe(deliveryHeroName)
        deliveryHeroChannel.bind('client-location', function (nextLocation) {
            //first save the location
            // bail if  location is same
            var prevLocation = deliveryHeroesLocationMap[deliveryHeroName] || {};
            deliveryHeroesLocationMap[deliveryHeroName] = nextLocation;
            showDeliveryHeroOnMap(deliveryHeroName, false, true, prevLocation);


          });
    }


     // add the name to the list
     var deliveryHeroTrackButton = document.createElement('button');
     deliveryHeroTrackButton.classList.add('small');
     deliveryHeroTrackButton.innerHTML = deliveryHeroName;
     deliveryHeroTrackButton.addEventListener('click', showDeliveryHeroOnMap.bind(null, deliveryHeroName, true, false, {}));
     deliveryHeroesList.appendChild(deliveryHeroTrackButton);
   }


   var deliveryHeroChannelName = 'private-' + deliveryHeroName;
   var deliveryHeroChannel = pusher.subscribe(deliveryHeroChannelName);



   deliveryHeroChannel.bind('client-location', function (nextLocation) {
    // first save the location
    // bail if location is same
    var prevLocation = deliveryHeroesLocationMap[deliveryHeroName] || {};
    deliveryHeroesLocationMap[deliveryHeroName] = nextLocation;
    showDeliveryHeroOnMap(deliveryHeroName, false, true, prevLocation);
 });



function showDeliveryHeroOnMap (deliveryHeroName, center, addMarker, prevLocation) {
    if (!deliveryHeroesLocationMap[deliveryHeroName]) return;
    // first center the map
    if (center) map.setCenter(deliveryHeroesLocationMap[deliveryHeroName]);
    var nextLocation = deliveryHeroesLocationMap[deliveryHeroName];
    
    // add a marker
    if ((prevLocation.lat === nextLocation.lat) && (prevLocation.lng === nextLocation.lng)) {
      return;
    }
    
    if (addMarker) {
      var marker = deliveryHeroesMarkerMap[deliveryHeroName];
      marker = marker || new google.maps.Marker({
        map: map,
        label: deliveryHeroName,
        animation: google.maps.Animation.BOUNCE,
      });
      marker.setPosition(deliveryHeroesLocationMap[deliveryHeroName]);
      deliveryHeroesMarkerMap[deliveryHeroName] = marker;
    }
  }

