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
All API End points and documentation can be found at:

## In the Headers include Key = Accept and Value = application/json for every request 

The following is just a simple list of the api end points:

- CREATE USER 
 ```shell
   Fields 
   $ name
   $ password
   $ email
```
>POST /api/create/user

- LOG IN USER (GENERATE API KEY)

```shell
   Fields  
   $ password
   $ email
```
>POST /api/login

- GET USER WHO IS CURRENTLY LOGGED IN
```shell
   Fields  
   $ password
   $ email
```
>GET /api/logged/user

-  USER LOGOUT
```shell
   Fields  
   $ password
   $ email
```

>GET /api/logout

- GET PRODUCTS 
```shell
   ALL SEEDED
```
### PLEASE USE THE ACCESS_TOKEN GENERATED (API_KEY) FOR AUTHORISATION FOR THE NEXT PROCEDURES 

>GET /api/products/

- VIEW ONE  PRODUCT
```shell
   Fields  
   $ password
   $ email
```
>GET /api/products/:id

- CREATE CART 
```shell
   Fields  
   $ product_identifier
   $ description
```
>GET /api/carts/

- VIEW  CART
```shell
   Fields  
 
```

>GET /api/carts/:id

- UPDATE  CART
```shell
   Fields  
   $ product_identifier
   $ description
```

>PATCH /api/carts/:id

- DELETE  CART
```shell
   Fields  
   $ cart_id
```

>DEL /api/carts/:id


# Installation

Install the dependencies and start the server to test the Api.

```sh
$ Composer install
$ php artisan key:generate
```


 For  sqlite database follow the instruction below
 - Create a file called database.sqlite under the folder database 
 - Then set your database connection to sqlite in the .env file
 
Example
 ```sh
 DB_CONNECTION=sqlite
 ```



For other mysql database configuration 
 - Please set your  database connection to mysql  , username and password for your database 
 
Example 
```shell
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=password
```

```sh
$ php artisan migrate
$ php artisan breeze:install
$ php artisan db:seed

#Test command 
$ php artisan test --filter CartTest
```


###USERS

They are already two installed users

```sh
email:user1@yiya.com
password:user12345
```
```sh
email:user2@yiya.com
password:user12345
```


### Todos

- Add more features
- implement a front-page for the store
- integrate with a real payment gateway

