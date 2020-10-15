<?php

namespace App\Http\Menus;

/**
 * 空菜单
 * @author chenlong
 */
class EmptyMenu extends BaseMenu
{
    public function list()
    {
        $this->route = 'empty/index';

        $this->fieldMenu->setField('id', 'text', 'ID');;

        return $this;
    }

    public function detail()
    {
        return $this;
    }

    public function create()
    {
        return $this;
    }
}