<?php
require('../../../dmxConnectLib/dmxConnect.php');


$app = new \lib\App();

$app->define(<<<'JSON'
{
  "meta": {
    "$_POST": [
      {
        "type": "text",
        "name": "email"
      },
      {
        "type": "text",
        "name": "password"
      }
    ]
  },
  "exec": {
    "steps": [
      {
        "name": "hash",
        "module": "crypto",
        "action": "passwordHash",
        "options": {
          "password": "{{$_POST.password}}",
          "algo": "argon2id"
        },
        "outputType": "text"
      },
      {
        "name": "insert",
        "module": "dbupdater",
        "action": "insert",
        "options": {
          "connection": "db",
          "sql": {
            "type": "insert",
            "values": [
              {
                "table": "users",
                "column": "email",
                "type": "text",
                "value": "{{$_POST.email}}"
              },
              {
                "table": "users",
                "column": "password",
                "type": "text",
                "value": "{{hash}}"
              }
            ],
            "table": "users",
            "returning": "id",
            "query": "INSERT INTO users\n(email, password) VALUES (:P1 /* {{$_POST.email}} */, :P2 /* {{hash}} */)",
            "params": [
              {
                "name": ":P1",
                "type": "expression",
                "value": "{{$_POST.email}}"
              },
              {
                "name": ":P2",
                "type": "expression",
                "value": "{{hash}}"
              }
            ]
          }
        },
        "meta": [
          {
            "name": "identity",
            "type": "text"
          },
          {
            "name": "affected",
            "type": "number"
          }
        ]
      }
    ]
  }
}
JSON
);
?>