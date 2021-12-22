###
POST http://localhost:8100/dmxConnect/api/auth/register.php
Content-Type: application/json

{
  "email": "test@test.com",
  "password": "123456"
}

###
POST http://localhost:8100/dmxConnect/api/auth/login.php
Content-Type: application/json

{
  "email": "test@test.com",
  "password": "123456"
}

# >>> AUTHORIZED!
