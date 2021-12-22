<?php
$exports = <<<'JSON'
{
  "name": "security",
  "module": "auth",
  "action": "provider",
  "options": {
    "secret": "csIPKLbdNqgwHQq",
    "provider": "Database",
    "connection": "db",
    "passwordVerify": true,
    "users": {
      "table": "users",
      "identity": "id",
      "username": "email",
      "password": "password"
    },
    "permissions": {}
  },
  "meta": [
    {
      "name": "identity",
      "type": "text"
    }
  ]
}
JSON;
?>