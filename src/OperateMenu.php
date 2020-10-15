<?php

namespace App\Libs\Menus;

/**
 * 操作
 * @author chenlong
 */
class OperateMenu extends ButtonMenu
{
    public $field;

    public function jsonSerialize()
    {
        return [
            'field' => $this->field,
            'name' => $this->name,
            'btnType' => $this->btnType,
            'showType' => $this->showType,
            'route' => $this->route,
            'postKey' => $this->postKey,
            'closeWin' => $this->closeWin,
            'refreshWin' => $this->refreshWin,
            'tipMessage' => $this->tipMessage,
        ];
    }

    /**
     * 设置操作项
     * @param [type] $title 表单默认值
     * @param [type] $type  表单类型 text select checkbox
     * @param [type] $name  提交字段
     * @param [type] $data  表单值
     */
    public function setOperate($field, $name, $btnType, $showType, $route, $postKey = '', $closeWin = 1, $refreshWin = 1, $tipMessage = '')
    {
        $obj = clone $this;
        $obj->field = $field;
        $obj->name = $name;
        $obj->btnType = $btnType;
        $obj->showType = $showType;//操作数据时不需要此字段
        $obj->route = $route;
        $obj->closeWin = $closeWin;
        $obj->refreshWin = $refreshWin;
        $obj->postKey = $btnType == 1 ? '' : $postKey;//添加时不需要此字段
        $obj->tipMessage = $tipMessage;
        $this->baseMenu->operate[] = $obj;
    }
}