<?php
namespace app\controller;
use core\fast\FastController;
use core\http\Response;

class HelloController extends FastController {

    public function render(){
        Response::view('hello', ['message' => "Fast Flight"]);
    }

}
