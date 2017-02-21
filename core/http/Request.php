<?php
/**
 * Created by PhpStorm.
 * User: fsoares
 * Date: 20/02/17
 * Time: 20:27
 */

namespace core\http;
use Flight;

/**
 * Class Request
 * Daels with HTTP Request
 * @package core\http
 */
class Request{

    /**
     * Return all Flight Request Objects
     * @return \flight\net\Request
     */
    public static function all(){
        return Flight::request();
    }

    /**
     * Objects sent by form data by method post
     * @return object
     */
    public static function post(){
        return (object)$_POST;
    }

    /**
     * Objects sent by form data by method get
     * @return object
     */
    public static function get(){
        return (object)$_GET;
    }

    /**
     * Objects sent by form data by method post
     * @return object
     */
    public static function file(){
        return (object)$_FILES;
    }

    /**
     * Objects sent by json data by method post
     * @return object Return null if can't read
     */
    public static function json(){
        $data = json_decode(file_get_contents('php://input'), true);
        if($data == false)
            return null;

        return $data;
    }

}
