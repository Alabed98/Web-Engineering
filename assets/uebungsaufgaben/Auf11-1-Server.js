const http = require('http');
const url = require('url');

http.createServer(function (req, res) {
    let result = "";
    req.on("data", chunk => {
        result += chunk;
    })

    req.on("end", function() {
        const obj= {};
        result.split("&").forEach(param => {
            const [key, value] = param.split("=");
            obj[key] = value;
        });
        res.writeHead(200, {
            'Content-Type': 'text/html'
          });
          res.write('Hallo ' + obj.name);
          res.end();
    });

}).listen(3000);
console.log("Server läuft!");
