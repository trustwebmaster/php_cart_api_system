This Project is An API Key System


## Task Requirements:
- The API keys must be unique 
- The Key should give permissions to minimize security
- If the user is logged in, the order should be linked to them.
- The user can list their previous cart.
- The user can create  cart.
- The user can update  cart.
- The user can delete  cart.

## Assumptions!
- The User can create more than one cart
- No product variations are present
- No payment gateway is integrated
- The API in question is a RESTful API
- The Cart data is persisted to the database.
- Carts Created by logged in Users should be connected to them.
- The Users Can signUp Or login using thier email addresses and passwords, users will be given an access_token upon signin in.
- The Products listing is dummy and thus no need to paginate the data.


## Language, Framework, and Datastore. Choices Made!
- This System is implemented using php laravel framework
- Sqlite is used as a Database for this application




# API documentation:
All API End points 

The following is just a simple list of the api end points:

>POST /api/auth/signup

>POST /api/auth/login

>GET /api/auth/logout

>GET /api/products/

>GET /api/products/:id

>POST /api/carts/

>GET /api/carts/:CartToken

>POST /api/carts/:CartToken

>POST /api/carts/:CartToken/checkout

>DEL /api/carts/:CartToken

>GET /api/orders

>GET /api/orders/:orderID


# Installation

Install the dependencies and start the server to test the Api.

```sh
$ Composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan breeze:install
$ php artisan db:seed
```



### Todos

- Add more features
- implement a front-page for the store
- integrate with a real payment gateway

License
----
