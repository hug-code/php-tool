<?php
/**
 * @name: 实例化
 * @Created by PhpStorm
 * @author: yashuai
 * @file: InstanceTool.php
 */

namespace HugCode\PhpTool;

trait InstanceTool
{

    public $params;

    /**
     * Instances of the derived classes.
     * @var array
     */
    protected static $instances = array();


    /**
     * set params
     * @param $params
     * @return $this
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * Get instance of the derived class.
     * @param array $params
     * @return static
     */
    public static function instance($params = [])
    {
        $className = get_called_class();
        if (!isset(self::$instances[$className])) {
            self::$instances[$className] = new $className;
        }
        self::$instances[$className]->params = $params;
        return self::$instances[$className];
    }

}
