# FastFlight
Using Flight microframework efficiently.

    <?php
      namespace app\controller;

      use core\fast\FastController;
      use core\http\Response;

      class HelloController extends FastController {
          public function render(){
              Response::view('hello', ['message' => "It Works"]);
          }
      }
## What is Flight?
Flight is a fast, simple, extensible framework for PHP. Flight enables you to quickly and easily build RESTful web applications... But you can see better here.

    require 'flight/Flight.php';

    Flight::route('/', function(){
      echo 'hello world!';
    });

    Flight::start();
Checkout the truly Flight.

## What is Fast Flight?
FastFlight is a extention of Flight that allows you work with MVC in a simple as Flight is. You can develop large programs and small ones.

It's easy and scalable with out complications.

## How to get started?
You will need to have the Composer installed and PHP 7.0 or superior.

    $ composer create-project 1fabiosoares/fastflight nameOfProject
    $ cd nameOfProject/www
    $ php -S localhost:8000

Or you can clone de project

    $ git clone https://github.com/1fabiosoares/FastFlight.git
    $ cd FastFlight
    $ composer install
    $ cd www
    $ php -S localhost:8000

And you ready to go! :)
