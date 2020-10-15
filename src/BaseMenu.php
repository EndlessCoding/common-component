<?php

namespace App\Libs\Menus;

/**
 * 列表数据
 * @author chenlong
 */
abstract class BaseMenu
{
    use TraitsMenu;

    /**
     * 菜单路由
     * @var [type]
     */
    public $api = '';//接口地址

    /**
     * 客户端是否显示分页
     * @var integer
     */
    public $showPage = 1;

    /**
        'fields' => [
            'ID' => 'ID',
            'name' => '姓名',
            'username' => '用户名',
            'mobilephone' => '手机号',
            'email' => '邮箱',
            'departmentName' => '部门',
            'roleName' => '角色',
            'leader' => '上级',
            'entryDate' => '入职日期',
            'statusName' => '状态',
        ],
     */
    public $fields = [];//列表表头
    public $fieldExt = [];//列表表头

    public $postData = ['page' => 1, 'pageSize' => 20];//请求默认值

    public $search = [];
    public $button = [];
    public $dataEvent = [];
    public $tab = [];
    public $operate = [];

    function __construct()
    {
        $list = [
            'fieldMenu'     => \App\Libs\Menus\FieldMenu::class,
            'tabMenu'       => \App\Libs\Menus\TabMenu::class,
            'searchMenu'    => \App\Libs\Menus\SearchMenu::class,
            'buttonMenu'    => \App\Libs\Menus\ButtonMenu::class,
            'eventMenu'     => \App\Libs\Menus\EventMenu::class,
            'operateMenu'   => \App\Libs\Menus\OperateMenu::class,
        ];

        foreach ($list as $obj => $class) {
            $this->$obj = app($class);
            $this->$obj->initBaseMenu($this);
        }
    }

    /**
     * 用于兼容老版本
     * @param  string $funcName [description]
     * @param  array  $args     [description]
     * @return [type]           [description]
     */
    public function __call(string $funcName, array $args)
    {
        $map = [
            'setField' => $this->fieldMenu,
            'setFieldExt' => $this->fieldMenu,
            'setBtn' => $this->buttonMenu,
            'setTab' => $this->tabMenu,
            'setSearch' => $this->searchMenu,
            'setEvent' => $this->eventMenu,
        ];

        if (isset($map[$funcName])) {
            return call_user_func_array([$map[$funcName], $funcName], $args);
        } else {
            throw new \Exception("调用方法不存在({$funcName})");
        }
    }
}