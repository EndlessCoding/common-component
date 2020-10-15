<?php

namespace App\Libs\Menus;

/**
 * 事件
 * @author chenlong
 */
class EventMenu extends ComponentMenu
{
    public $showType = 'page';//page-新页面 window-弹窗
    public $route = '';//页面地址
    public $refreshWin = 1;//是否刷新当前页 1-刷新 0-不刷新
    public $winTitle = '';//弹窗或新页面标题

    public function jsonSerialize()
    {
        return [
            'showType' => $this->showType,
            'route' => $this->route,
            'refreshWin' => $this->refreshWin,
            'winTitle' => $this->winTitle,
        ];
    }

    /**
     * 设置事件
     * @param [type]  $route    [description]
     * @param integer $showType [description]
     */
    public function setEvent($route, $winTitle, $showType = 'page', $refreshWin = 1)
    {
        $this->baseMenu->dataEvent = $this;
        $this->baseMenu->dataEvent->route = $route;
        $this->baseMenu->dataEvent->winTitle = $winTitle;
        $this->baseMenu->dataEvent->showType = $showType;
        $this->baseMenu->dataEvent->refreshWin = $refreshWin;
    }
}