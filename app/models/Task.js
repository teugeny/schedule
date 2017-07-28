var Task
    , mysql = require('mysql')
    , dbconfig = require('../database')
    , db = mysql.createConnection(dbconfig.connection);

db.query('USE ' + dbconfig.database);

module.exports = {
    /**
     * Get all tasks
     * @param callback
     */
    findAll: function(callback) {
        db.query("select * from tasks",function(err, rows) {
            var res = err
                ? {err: err, rows: null}
                : {err: null, rows: rows};

            if (callback) {
                callback(res.err, res.rows)
            }
        })
    },

    /**
     * Get task by id
     * @param id
     * @param callback
     */
    getById: function(id, callback) {
        db.query("select * from tasks where id = '"+id+"' ", function(err, rows) {
            var res = err
                ? {err: err, rows: null}
                : {err: null, rows: rows};

            if (callback) {
                callback(res.err, res.rows);
            }
        })
    },

    /**
     * Get task by name
     * @param name
     * @param callback
     */
    getByName: function(name, callback) {
        db.query("select * from tasks where name = '"+name+"'", function(err, rows) {
            var result = err
                ? {err: err, rows: null}
                : {err: null, rows: rows[0]};
            if (callback) {
                callback(result.err, result.rows);
            }
        })
    }
};