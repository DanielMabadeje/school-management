var express = require('express');
var bodyParser = require('body-parser');
var Pusher = require('pusher');

var app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

// to serve our JavaScript, CSS and index.html
app.use(express.static('./'));

var pusher = new Pusher({
  appId: '1230044',
  key: '9a3f71f9e4863b13493f',
  secret:  '3293b4a15359d4d3c8bf',
  cluster: '<eu>'
});

app.post('/pusher/auth', function(req, res) {
  var socketId = req.body.socket_id;
  var channel = req.body.channel_name;
  var auth = pusher.authenticate(socketId, channel);
  res.send(auth);
});

// var port = process.env.PORT || 80;
// app.listen(port, () => console.log('Listening at http://localhost:5000'));
// app.listen(port, () => console.log('Listening at http://localhost:80'));
app.listen();