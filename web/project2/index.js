console.log('index.js running!');
var http = require('http');
http.createServer(function (req, res) {
  res.writeHead(200, {
    'Content-Type': 'text/html'
  });
  res.write('<h1>Welcome to the Home Page</h1>');
  res.write('<button type="button" onclick="rate()">Click Here</button>');
  res.write('<script src="index.js"></script>');
  res.end();
}).listen(8080);

function calculateRate() {
  return 3.50;
}

function rate() {
  console.log("start of rate function");
  var express = require('express');
  var app = express();
  app.set('view engine', 'ejs');
  var rate = calculateRate();
  app.get('/', function (req, res) {
    res.render('index', {
      title: "EJS Page",
      rate: rate
    });
  });
  console.log("end of rate function");
}