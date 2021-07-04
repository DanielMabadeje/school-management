

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