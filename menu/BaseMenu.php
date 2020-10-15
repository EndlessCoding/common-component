<?php

namespace App\Http\Menus;

use App\Libs\Menus\BaseMenu as CommonBaseMenu;

/**
 * 列表数据
 * @author chenlong
 */
abstract class BaseMenu extends CommonBaseMenu
{
    /**
     * 列表页面
     * @return [type] [description]
     */
    abstract public function list();

    /**
     * 详情页面
     * @return [type] [description]
     */
    abstract public function detail();

    /**
     * 添加页面
     * @return [type] [description]
     */
    abstract public function info();
}