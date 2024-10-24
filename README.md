#  Inventory Management System

The IMS ( Inventory Management System) is created for consuming REST APIs of items and categories and managing their association between them securely. 

For a full description of the module, visit the
[project page](https://github.com/Vivek/IMS).

Submit bug reports and feature suggestions, or track changes in the
[issue queue](https://github.com/Vivek/IMS/issues).


## Table of contents

- Requirements
- Recommended modules
- API consumption
- Installation
- Configuration
- Troubleshooting
- FAQ
- Maintainers


# Requirements
This project requires the following modules:

- [Framework]Laravel
- [Database] Mysql
- [PackageManager] Composer
- [Language] PHP
- [Authentication] laravel/sanctum
- [spatie/laravel-query-builder] Sorting & Filtering

# Recommended modules

    "require": {
        "php": "^8.1",
        "guzzlehttp/guzzle": "^7.2",
        "inertiajs/inertia-laravel": "^0.6.8",
        "laravel/framework": "^10.10",
        "laravel/sanctum": "^3.2",
        "laravel/tinker": "^2.8",
        "spatie/laravel-query-builder": "^5.6",
        "tightenco/ziggy": "^1.0"
    },
    "require-dev": {
        "fakerphp/faker": "^1.9.1",
        "laravel/breeze": "^1.26",
        "laravel/pint": "^1.0",
        "laravel/sail": "^1.18",
        "mockery/mockery": "^1.4.4",
        "nunomaduro/collision": "^7.0",
        "phpunit/phpunit": "^10.1",
        "spatie/laravel-ignition": "^2.0"
    },

# APIs


# Documentation
# User login and registration


POST
Login
http://127.0.0.1:8000/api/login


Authorization
Bearer Token
Token
<token>
Request Headers
Content-Type
application/json
Authorization
Bearer 1|c80GFrq7tIKRq8XwcxiH6SzHGxnnkZAG2FQX5MQN47317e22
Body
raw (json)
json
{
    "email": "test@example.com",
    "password": "password"
}
Example
Login
Request
cURL
curl --location 'http://127.0.0.1:8000/api/login' \
--data-raw '{
    "email": "vivek.lode1@gmail.com",
    "password": "Vikz@123"
}'
200 OK
Response
Body
Headers (9)
json
{
    "access_token": "1|S39LVHOu7qK7y2EMGx8wy1y2ZfMWw7jNUAYssC4P088c296e",
    "token_type": "Bearer"
}
GET
Get API User Depricated
http://127.0.0.1:8000/api/user


Request Headers
Content-Type
application/json
Authorization
Bearer 3|7IkgLKx0ehnm7ZJCd0avjJqYBPAeLh2l4WAYDYSm2a19358f
POST
Register User
http://127.0.0.1:8000/api/register


Body
raw (json)
json
{
    "name": "Test User",
    "email": "test@example.com",
    "password": "password",
    "password_confirmation": "password"
}


# Documentation
# Items

GET
Get data
http://127.0.0.1:8000/api/items
This is a GET request and it is used to "get" data from an endpoint. There is no request body for a GET request, but you can use query parameters to help specify the resource you want data on (e.g., in this request, we have id=1).

A successful GET response will have a 200 OK status, and should include some kind of response body - for example, HTML web content or JSON data.

Request Headers
Authorization
Bearer 4|pufKLPBL1UiSzUz3rkO3pVizW5ZafZgBfjSGJY1V3b5766fb
GET
# Get data single
http://127.0.0.1:8000/api/items/1
This is a GET request and it is used to "get" data from an endpoint. There is no request body for a GET request, but you can use query parameters to help specify the resource you want data on (e.g., in this request, we have id=1).

A successful GET response will have a 200 OK status, and should include some kind of response body - for example, HTML web content or JSON data.


Request Headers
Content-Type
application/json
Authorization
Bearer 4|pufKLPBL1UiSzUz3rkO3pVizW5ZafZgBfjSGJY1V3b5766fb
POST
# Post data
http://127.0.0.1:8000/api/items
This is a POST request, submitting data to an API via the request body. This request submits JSON data, and the data is reflected in the response.

A successful POST request typically returns a 200 OK or 201 Created response code.


Request Headers
Content-Type
application/json
Authorization
Bearer 4|pufKLPBL1UiSzUz3rkO3pVizW5ZafZgBfjSGJY1V3b5766fb
Body
raw (json)
json
{
    // "id": 51,
    "name": "Itemer123",
    "categories": [3,1],
    "description": "ITEMER 123",
    "price": 34454,
    "quantity": 5330,
    "created_at": "2023-12-11T16:10:48.000000Z",
    "updated_at": "2023-12-11T16:10:48.000000Z"
}
PUT
# Update data
http://127.0.0.1:8000/api/items/1
This is a PUT request and it is used to overwrite an existing piece of data. For instance, after you create an entity with a POST request, you may want to modify that later. You can do that using a PUT request. You typically identify the entity being updated by including an identifier in the URL (eg. id=1).

A successful PUT request typically returns a 200 OK, 201 Created, or 204 No Content response code.


Request Headers
Content-Type
application/json
Authorization
Bearer 4|pufKLPBL1UiSzUz3rkO3pVizW5ZafZgBfjSGJY1V3b5766fb
Body
raw (json)
json
{
    "id": 1,
    "name": "Updated Item50",
    "categories": [3],
    "description": "THIS IS ITEM 50 FRESH",
    "price": "400.00",
    "quantity": "50",
    "created_at": "2023-12-11T16:10:48.000000Z",
    "updated_at": ""
}
DELETE
# Delete data
http://127.0.0.1:8000/api/items/3
This is a DELETE request, and it is used to delete data that was previously created via a POST request. You typically identify the entity being updated by including an identifier in the URL (eg. id=1).

A successful DELETE request typically returns a 200 OK, 202 Accepted, or 204 No Content response code.


Request Headers
Authorization
Bearer 4|pufKLPBL1UiSzUz3rkO3pVizW5ZafZgBfjSGJY1V3b57

# Documentation
# Categories

Get started here
This template guides you through CRUD operations (GET, POST, PUT, DELETE), variables, and tests.

GET
# Get data
http://127.0.0.1:8000/api/categories
This is a GET request and it is used to "get" data from an endpoint. There is no request body for a GET request, but you can use query parameters to help specify the resource you want data on (e.g., in this request, we have id=1).

A successful GET response will have a 200 OK status, and should include some kind of response body - for example, HTML web content or JSON data.


Request Headers
Content-Type
application/json
Authorization
Bearer 4|pufKLPBL1UiSzUz3rkO3pVizW5ZafZgBfjSGJY1V3b5766fb
GET
Get data single
http://127.0.0.1:8000/api/categories/1
This is a GET request and it is used to "get" data from an endpoint. There is no request body for a GET request, but you can use query parameters to help specify the resource you want data on (e.g., in this request, we have id=1).

A successful GET response will have a 200 OK status, and should include some kind of response body - for example, HTML web content or JSON data.


Request Headers
Authorization
Bearer 4|pufKLPBL1UiSzUz3rkO3pVizW5ZafZgBfjSGJY1V3b5766fb
POST
# Post data
http://127.0.0.1:8000/api/categories
This is a POST request, submitting data to an API via the request body. This request submits JSON data, and the data is reflected in the response.

A successful POST request typically returns a 200 OK or 201 Created response code.


Request Headers
Content-Type
application/json
Authorization
Bearer 4|pufKLPBL1UiSzUz3rkO3pVizW5ZafZgBfjSGJY1V3b5766fb
Body
raw (json)
json
{
    // "id": 2,
    "name": "fruits",
    "description": "THIS IS fruits Vehicles",
    "created_at": "2023-12-11T16:10:48.000000Z",
    "updated_at": "2023-12-11T16:10:48.000000Z"
}
PUT
# Update data
http://127.0.0.1:8000/api/categories/1
This is a PUT request and it is used to overwrite an existing piece of data. For instance, after you create an entity with a POST request, you may want to modify that later. You can do that using a PUT request. You typically identify the entity being updated by including an identifier in the URL (eg. id=1).

A successful PUT request typically returns a 200 OK, 201 Created, or 204 No Content response code.

Request Headers
Authorization
Bearer 4|pufKLPBL1UiSzUz3rkO3pVizW5ZafZgBfjSGJY1V3b5766fb
Body
raw (json)
json
{
    "id": 1,
    "name": "Updated Category3333",
    "description": "THIS IS updated Category3 3 FRESH",
    "created_at": "2023-12-11T16:10:48.000000Z",
    "updated_at": ""
}
DELETE
# Delete data
http://127.0.0.1:8000/api/categories/2
This is a DELETE request, and it is used to delete data that was previously created via a POST request. You typically identify the entity being updated by including an identifier in the URL (eg. id=1).

A successful DELETE request typically returns a 200 OK, 202 Accepted, or 204 No Content response code.


Request Headers
Authorization
Bearer 4|pufKLPBL1UiSzUz3rkO3pVizW5ZafZgBfjSGJY1V3b57
