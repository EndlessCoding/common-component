<?php

namespace App\Libs\Menus;

/**
 * tab
 * @author chenlong
 */
class TabMenu extends ComponentMenu
{
    private $type = 1;//1-多菜单 2-单菜单
    private $title = '';//表单默认值
    private $route = '';//路由

    public function jsonSerialize()
    {
        return [
            'type' => $this->type,
            'title' => $this->title,
            'route' => $this->route,
        ];
    }

    /**
     * 设置tab
     * @param [type] $title [description]
     * @param [type] $route [description]
     */
    public function setTab($title, $route)
    {
        $obj = clone $this;
        $obj->title = $title;
        $obj->route = $route;
        $this->baseMenu->tab[] = $obj;
        return $obj;
    }

    public function __set($key, $value)
    {
        $this->$key = $value;
    }
}