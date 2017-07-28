var express         = require('express'),
    http            = require('http'),
    bodyParser      = require('body-parser'),
    methodOverride  = require('method-override');
    Task            = require('./models/Task');

var app = module.exports = express();

app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());
app.use(methodOverride());

/**
 * Routes
 */
app.get('/api/first/:name',function(req,res){
    Task.getByName(req.params.name, function(err, task) {
        if (!err) {
            if (task !== undefined) {
                var result = {
                    id: task.id,
                    value: [5,10,5].random()
                };
            }
            res.json(200,result);
        } else {
            res.json(400, err)
        }
    });
});

app.get('/api/second/:name', function(req, res) {
    Task.getByName(req.params.name, function(err, task) {
        if ( !err && task.status !== 'processed') {
            var result = {
                id: task.id,
                processed: ['true','false'].random()
            };
            res.json(200, result);
        } else {
            res.json(400, err);
        }
    })
});

/**
 * Get random value from array
 * @returns {*}
 */
Array.prototype.random = function(){
    return this[Math.floor(Math.random()*this.length)];
};

/// Start server
app.set('port', process.env.PORT || 8000);
http.createServer(app).listen(app.get('port'), function(){
    console.log("Express server listening on port " + app.get('port'));
});
