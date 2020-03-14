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

const initOptions = {
  query(e) {
    console.log('QUERY:', e.query);
  }
};
const pgp = require('pg-promise')(initOptions);
var connect = {
  connectionString: 'postgres://lpdzdeczvntfek:c870d329c80fb6b49f55f425360e16bc9465fb10de5601ff67a60b61abe900f8@ec2-34-193-42-173.compute-1.amazonaws.com:5432/d3b0o3nhe1tsra',
  ssl: true,
  sslmode: require,
  rejectUnauthorized: true
}
const db = pgp(connect);
db.one('SELECT txt FROM quote WHERE id = 1')
  .then(function (data) {
    console.log('DATA:', data.value)
  })
  .catch(function (error) {
    console.log('ERROR:', error)
  });

// postgres://lpdzdeczvntfek:c870d329c80fb6b49f55f425360e16bc9465fb10de5601ff67a60b61abe900f8@ec2-34-193-42-173.compute-1.amazonaws.com:5432/d3b0o3nhe1tsra

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