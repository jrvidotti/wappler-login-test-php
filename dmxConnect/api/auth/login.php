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
    "steps": {
      "name": "identity",
      "module": "auth",
      "action": "login",
      "options": {
        "provider": "security",
        "username": "{{$_POST.email}}",
        "remember": 1
      },
      "output": true,
      "meta": []
    }
  }
}
JSON
);
?>