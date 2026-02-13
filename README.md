# PHP JWT Authentication API

A simple PHP API project demonstrating JWT-based authentication using
Firebase JWT.

## Features

-   User login endpoint
-   JWT token generation
-   Middleware-based token validation
-   Protected API endpoint
-   PDO prepared statements


------------------------------------------------------------------------

## Project Structure

    project/
    │
    ├── login.php
    ├── index-private.php
    ├── validate-token.php
    ├── jwt-middleware.php
    ├── auth.php
    └── index.php

------------------------------------------------------------------------

## Requirements

-   PHP 8+
-   Composer
-   Firebase JWT library

Install dependencies:

    composer require firebase/php-jwt

------------------------------------------------------------------------

## Login Endpoint

**POST /login.php**

Request body:

``` json
{
  "user": "shervin",
  "pass": "1"
}
```

Response:

``` json
{
  "token": "JWT_TOKEN"
}
```

------------------------------------------------------------------------

## Protected Endpoint

**GET /index-private.php**

Header:

    Authorization: Bearer YOUR_TOKEN

Response:

``` json
{
  "status": "success"
}
```

------------------------------------------------------------------------

## Security Notes

-   Use `password_hash()` for storing passwords.
-   Use `password_verify()` for login validation.
-   Never store secrets in source code in production.
-   Always use HTTPS in real deployments.
-   Set a reasonable token expiration time.

------------------------------------------------------------------------

## Example Token Payload

``` json
{
  "iss": "localhost",
  "iat": 1700000000,
  "exp": 1700001200,
  "user": "demo"
}
```

------------------------------------------------------------------------

## Author

Shervin Tehrani
