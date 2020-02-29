console.log('app.js running!');
var http = require('http');
var request = function onRequest(req){
  http.createServer(function (req, res) {
  if (req == '/home') {
    res.writeHead(200, {'Content-Type': 'text/plain'});
    res.write('<h1>Welcome to the Home Page</h1>');
  } else if (req == '/getData') {
    res.writeHead(200, {'Content-Type': 'application/json'});
    var student = {
      name: 'Harmony',
      class: 'cs313'
    }
    res.end(JSON.stringify(student));
  } else {
    res.writeHead(200, {'Content-Type': 'text/plain'});
    res.write('<h1>Error #404: Page not Found</h1>');
  }
  res.end();
}).listen(8080);
}
console.log(request);