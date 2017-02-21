<?php
/**
 * Created by PhpStorm.
 * User: fsoares
 * Date: 20/02/17
 * Time: 20:03
 */

namespace app\controller;
use core\fast\FastController;
use core\http\Response;

class HelloController extends FastController {

    public function render(){
        Response::view('hello', ['message' => "It Works"]);
    }

}
