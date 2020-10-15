<?php

namespace App\Libs\Menus;

/**
 * 列表数据
 * @author chenlong
 */
class ButtonMenu extends ComponentMenu
{
    public $name;
    public $btnType = 'add';//按钮类型 add-新增 edit-编辑 edit_muilt-批量编辑
    public $showType = 'page';//显示方式 page-新页面打开 window-弹窗 api-请求接口
    public $route = '';
    public $postKey = 'ID';
    public $closeWin = 1;//是否关闭 1-关闭 0-不关闭
    public $refreshWin = 1;//是否刷新当前页 1-刷新 0-不刷新
    public $tipMessage = '';//提示信息

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'btnType' => $this->btnType,
            'showType' => $this->showType,
            'route' => $this->route,
            'postKey' => ($this->btnType == 'add') ? '' : $this->postKey,
            'closeWin' => $this->closeWin,
            'refreshWin' => $this->refreshWin,
            'tipMessage' => $this->tipMessage,
        ];
    }

    /**
     * 设置搜索项
     * @param [type] $title 表单默认值
     * @param [type] $type  表单类型 text select checkbox
     * @param [type] $name  提交字段
     * @param [type] $data  表单值
     */
    public function setBtn($name, $btnType, $showType, $route, $postKey = '', $closeWin = 1, $refreshWin = 1, $tipMessage = '')
    {
        $obj = clone $this;
        $obj->name = $name;
        $obj->btnType = $btnType;
        $obj->showType = $showType;
        $obj->route = $route;
        $obj->closeWin = $closeWin;
        $obj->refreshWin = $refreshWin;
        $obj->postKey = $postKey;//添加时不需要此字段
        $obj->tipMessage = $tipMessage;
        $this->baseMenu->button[] = $obj;
    }
}