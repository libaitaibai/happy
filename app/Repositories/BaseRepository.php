<?php
/**
 * Created by PhpStorm.
 * User: lanchongyang
 * Date: 2018/10/18
 * Time: 12:37
 */

namespace App\Repositories;

use App\Models\BaseModel;
class BaseRepository
{

    public static $Repository;

    /**
     * 获得仓库层
     * @param $name
     * @return mixed
     */
    public static function getRepository(string $name)
    {
        $repClass = __NAMESPACE__.'\\'.ucfirst($name);

        if(!class_exists($repClass)){
            throw new \Exception('the class do not exit!');
        }

        if(!isset(self::$Repository[$name])){
            self::$Repository[$name] = new $repClass;
        }
        return self::$Repository[$name];
    }

    /**
     * get model
     */
    public function getModel(string $name)
    {
        return BaseModel::getModel($name);
    }
}