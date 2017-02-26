<?php
namespace core\http;

/**
 * Class Header
 * @package core\http
 */
class Header{
    /**
     * Set a Header
     * @param string $type Key of header
     * @param string $value Value of header
     * @param bool $replace
     */
    public static function set(string $type
        ,string $value
        ,bool $replace = true){

        header("{$type} : $value", $replace);
    }
}
