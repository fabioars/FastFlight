<?php

Flight::route("GET /", [\app\controller\HelloController::class, "render"]);
