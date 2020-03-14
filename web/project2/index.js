console.log('index.js running!');

var express = require('express');
var app = express();
app.set('view engine', 'ejs');
app.listen(8080);
app.get('/', function (req, res) {
  res.render('index');
});

app.get('/quotes', function (req, res) {
  res.writeHead(200, {
    'Content-Type': 'application/json'
  });
  var student = {
    name: 'Harmony',
    class: 'cs313'
  }
  res.end(JSON.stringify(student));
  res.render('quotes');
});

var pgp = require('pg-promise')
var db = pgp('postgres://username:password@host:port/database')
db.one('SELECT * FROM quotes')
  .then(function (data) {
    console.log('DATA:', data.value)
  })
  .catch(function (error) {
    console.log('ERROR:', error)
  });

// app.get('/detail', function (req, res) {
//   res.send('id: ' + req.query.id);
//   res.render('detail', {
//     id: id
//   });
// });

app.get('*', function (req, res) {
  res.render('error');
});



// -------------- OLD CODE, NOT IN USE ANYMORE --------------
// var http = require('http');
// http.createServer(function (req, res) {
//   res.writeHead(200, {
//     'Content-Type': 'text/html'
//   });
//   res.write('<h1>Welcome to the Home Page</h1>');
//   res.write('<button type="button" onclick="rate()">Click Here</button>');
//   res.write('<script src="index.js"></script>');
//   res.end();
// }).listen(8080);