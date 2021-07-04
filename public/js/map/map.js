

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
    })
}