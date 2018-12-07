<?php
/**
 * Created by PhpStorm.
 * User: lanchongyang
 * Date: 2018/10/18
 * Time: 14:14
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public static $model;

    /*
     * 获得模型层数据
     */
    public static function getModel(string $name)
    {
        $name = __NAMESPACE__.'\\'.ucfirst($name);
        if(!class_exists($name)){
            throw new \Exception('the class do not exit!');
        }
        if(!isset(self::$model[$name])){
            self::$model[$name] = new $name;
        }
        return self::$model[$name];
    }
}