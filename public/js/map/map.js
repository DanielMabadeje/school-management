

//get the location ia Geoloion API

if ('geolocation' in  navigator) {
    var currentLocation = navigator.geolocation.getCurrentPosition(function(){
        map.setCenter({
            lat:position.coords.latitude,
            lng:position.coords.longitude,
        });
    });
}


var username;

// reference for DOM nodes
var saveNameButton = document.getElementById('saveNameButton');
var saveNameBox = document.getElementById('name-box');
var nameInput = document.getElementById('name');
var welcomeHeading = document.getElementById('welcome-message');
var deliveryHeroBox = document.getElementById('delivery-hero-box');

saveNameButton.addEventListener('click', saveName);

// all functions, event handlers
function saveName (e) {
  var input = nameInput.value;
  if (input && input.trim()) {
    username = input;

    // hide the name box
    saveNameBox.classList.add('hidden');

    // set the name
    welcomeHeading.innerHTML = 'Hi! <strong>' + username +
      (mode === 'user'
        ? '</strong>, type in your Delivery Hero\'s name to track your food.' 
        : '</strong>, type in the customer name to locate the address');
    // show the delivery hero's div now
     deliveryHeroBox.classList.remove('hidden');
  }
  return;
}











var pusher = new Pusher('9a3f71f9e4863b13493f', {
    cluster:'eu',
    encrypted: true
})

function createMyLocationChannel (name) {
    var myLocationChannel = pusher.subscribe('private-' + name);
    myLocationChannel.bind('pusher:subscription_succeeded', function() {
      // safe to now trigger events
      // use the watchPosition API to watch the changing location
      // and trigger events with new coordinates
      locationWatcher = navigator.geolocation.watchPosition(function(position) {
        var location = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        triggerLocationChangeEvents(myLocationChannel, location);
      });
  
      // also start a setInterval to keep sending the loction every 5 secs
      sendLocationInterval = setInterval(function () {
        // not using `triggerLocationChangeEvents` to keep the pipes different
        myLocationChannel.trigger('client-location', myLastKnownLocation)
      }, 5000);
    });
  }




sendLocationInterval = setInterval(function () {
    // not using `triggerLocationChangeEvents` to keep the pipes different
    myLocationChannel.trigger('client-location', myLastKnownLocation)
  }, 5000);

// also update myLastKnownLocation everytime we trigger an event
function triggerLocationChangeEvents (channel, location) {
  // update myLastLocation
  myLastKnownLocation = location;
  channel.trigger('client-location', location);
}



// function createMyLocationChannel(name) {
//     var myLocationChannel = pusher.subscribe('private-' + name);
//     myLocationChannel.bind('pusher:subscription_succeeded', function (params) {
        
//         // safe to now trigger events
//         // use the watchPosition API to watch the changing location
//         // and trigger events with new coordinates

//         locationWatcher=navigator.geolocation.watchPosition(function (position) {
//             var location = {
//                 lat:position.coords.latitude,
//                 lng:position.coords.longitude
//             };

//             triggerLocationChangeEvents(myLocationChannel, location);
            
//         });

//         // also start a setInterval to keep sending the location every 5  secs
//         sendLocationInterval=setInterval(function (params) {

//             // not using `triggerLocationChangeEvents`  to keep the pipes different
//             myLocationChannel.trigger('client-location', myLastKnownLocation)
//         }, 5000);
//     })

// }


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

