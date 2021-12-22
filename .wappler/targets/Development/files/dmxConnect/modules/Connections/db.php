<?php
// Database Type : "PostgreSQL"
// Database Adapter : "postgres"
$exports = <<<'JSON'
{
    "name": "db",
    "module": "dbconnector",
    "action": "connect",
    "options": {
        "server": "postgres",
        "databaseType": "PostgreSQL",
        "connectionString": "pgsql:dbname=teste-login;user=db_user;password=4PHwqzV0;host=db"
    }
}
JSON;
?>