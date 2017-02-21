<?php
/**
 * Created by PhpStorm.
 * User: fsoares
 * Date: 20/02/17
 * Time: 19:44
 */

Flight::route("GET /", [\app\controller\HelloController::class, "render"]);