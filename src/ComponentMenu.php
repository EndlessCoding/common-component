<?php

namespace App\Libs\Menus;

use Yii;

/**
 * 组件
 * @author chenlong
 */
abstract class ComponentMenu implements \JsonSerializable
{
    public $baseMenu;

    function initBaseMenu(BaseMenu $baseMenu)
    {
        $this->baseMenu = $baseMenu;
    }
    // public function __set($key, $value)
    // {
    //     $this->$key = $value;
    //     return $this;
    // }
}