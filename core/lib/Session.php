<?php
namespace core\lib;

/**
 * Class Session
 * Handle with Sessions
 * @package core\http
 */
class Session{

    /**
     * Start a session
     * Session constructor.
     */
    public function __construct(){
        $this->start();
    }

    /**
     * Start a Session
     */
    public function start(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    /**
     * Set a value on session
     * @param string $key
     * @param $value
     */
    public function __set(string $key, $value){
        $_SESSION[$key] = $value;
    }

    /**
     * Get a value on session
     * @param string $key
     * @return mixed
     */
    public function __get(string $key){
        return $_SESSION[$key];
    }

    /**
     * Verify if a key exists
     * @param string $key
     * @return bool
     */
    public function __isset(string $key){
        return isset($_SESSION[$key]);
    }

    /**
     * Clean all values from session
     */
    public function clear(){
        $_SESSION = [];
    }
    /**
     * Finish the session
     */
    public function destroy(){
        session_destroy();
    }
}
