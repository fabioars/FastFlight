<?php
namespace core\fast;

/**
 * Class FastTap
 * @package core\fast
 */
abstract class FastTap{
    /**
     * Call a function
     * @param callable $callback
     * @param array $params
     */
    private static function next(callable $callback, array $params = []){
        if(empty($params)){
            call_user_func($callback);
            return;
        }
        call_user_func_array($callback, $params);
    }

    /**
     * Check before call the function.
     * @param callable $calback
     * @param array $params
     * @return mixed
     */
    public abstract static function handle(callable $calback, array $params = []);

}

