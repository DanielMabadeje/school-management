

// (function () {
//     // load the map
//     map = new google.maps.Map(document.getElementById('map'), {
//       center: {lat: -34.397, lng: 150.644},
//       zoom: 8
//     });
//   }());


var map
  , you
  , pos
  , t_0
  , log = ''
  , url = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAARCAYAAADdRIy+AAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9sBHxAxMpOb3XcAAAOBSURBVDjLfZRNa1xlGIav877nY2bOzJnMR77TNIkJpSpBW4qiGGJAECpSEFz0D/gDKrp9wVVBXPkLXLkrqBtBZKJFQaqghbZp09SkTUwyH5mvMzPnvHPOcZEUumj6wL17nmvz3PdtcMoopQRg27btdpYvXQSS7N9/3NZaB0BHKTV83p3xHJAFzFQWVj4bdPjonGsXisIwm35Iy2C40dON0VHrxurD9evAvlKqfypQKeW15l9d/enI+9qr+2fWXplmcbpA0UtT6wx48OSIu4/r3Nqqkjs3tvN+/uiat31vHagppRIA8xnYBPnShRub1reiUU0vX5gnPTlKfjzPzEiKIBPg4GDFNrlmwJ2bW7O981PfXM1mP7b73T+B/wDECSwTRdHi9/L8V9t399Le3BSMT0B+BDIukWkTp1ySfIF4bJzk7ByMlfn3zl76x/RrXwohlpRSRQCplDKAs9uzF6/+/Oveh1GpyOjSAsWJUUbyOTK2hU4EDS05HNocxDYHkaQRG9Dr03hULU8vz9e9o92ttbW1ugA8YGrTz7wT6JhkbJJBdoSelaMTSGoD2O1DLYB2CD1t03dKUJyAyUmCgWbTz6w4jlMA0ibgSim9Wms4S2EEcnk6Ikd7KKkDMoaUgC5QF9CS0MWEdB68IhQK1FrRDIICkDUBUwhh+M3Aw3XBcakmKUoGuAZEBlgG9CVUTWiY0JaAnYFUBtwsfifwyJMAlglorXXsOk6bSGbBJLIk94cwAM5YYNvQT6CewKEFiQNoEwwbTBs3JduABnwT8E3T9MuOfLzRjaeIYpAJ2jJ4aMC2AVb62FrBEGILsAGRQJxAklB2zZ1EJwOgJ4DOcDjcfSnT+8XRIQwGEA6ODWXAUELfPlZsnkRBAFpDEOBEmsW0fzMMwyqgZaVSYXV1NSyFh61mbumtvX5SJpuBnAupp04FQqAHBIAP1Jqwf8DreePepc5v16WU95VSwdN1P47jB5ed29fmDO1TrUOtDZ0TSPNEPU7e3YVagzmh/feSW58KITaUUl0ACVCpVKhUKv67b7+xP1/K/NXxs282+kEhiQEtIBTQS+BIw2ELeVDl5V536wNv+xPXf/K7Uqr+oraxgdF19/Lnjyz3is6mygeYaQwYJ+5b3aC2EHa+W/F/+AJoKKX0C+vrGbABpCzLyvqzK8uJIaPcTuWfMAw10D+tD/8H7d6IDx2EfHUAAAAASUVORK5CYII='
  , head = '["latitude","longitude","precision","time"]'
  , zoom
  , time
  , from
  ;

// google.maps.event.addDomListener(window, 'load', init);

map = new google.maps.Map( document.getElementById('map')
                           , { zoom: zoom
                             , mapTypeId: google.maps.MapTypeId.ROADMAP
                             });
// get the location via Geolocation API
if ('geolocation' in navigator) {
    var currentLocation = navigator.geolocation.getCurrentPosition(function (position) {
      map.setCenter({
        lat: position.coords.latitude,
        lng: position.coords.longitude
      });
    });
  }



//   break;


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

// var Pusher = require("pusher");

// var pusher = new Pusher({
//   appId: "APP_ID",
//   key: "APP_KEY",
//   secret: "APP_SECRET",
//   cluster: "APP_CLUSTER",
// });

// pusher.trigger("my-channel", "my-event", { message: "hello world" });



var pusher = new Pusher('9a3f71f9e4863b13493f', {
    cluster: 'eu',
    encrypted: true
  });




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





//   sendLocationInterval = setInterval(function () {
//     // not using `triggerLocationChangeEvents` to keep the pipes different
//     myLocationChannel.trigger('client-location', myLastKnownLocation)
//   }, 5000);

// also update myLastKnownLocation everytime we trigger an event
function triggerLocationChangeEvents (channel, location) {
  // update myLastLocation
  myLastKnownLocation = location;
  channel.trigger('client-location', location);
}




var deliveryHeroesAddButton=document.getElementById("addDeliveryHeroButton")
deliveryHeroesAddButton.addEventListener('click', addDeliveryHero);






function addDeliveryHero (e) {
    var deliveryHeroName = deliveryHeroNameInput.value;
    // if already present return
    if (deliveryHeroesLocationMap[deliveryHeroName]) return;
    if (deliveryHeroName) {
      var deliveryHeroChannelName = 'private-' + deliveryHeroName;
      var deliveryHeroChannel = pusher.subscribe(deliveryHeroChannelName);
      deliveryHeroChannel.bind('client-location', function (nextLocation) {
        // first save the location
        // bail if location is same
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
