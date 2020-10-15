<?php

namespace App\Services;

class OptionService
{
    /**
     * 菜单对象
     * @var null
     */
    private $menu = null;

    /**
     * 菜单参数
     * @var array
     */
    private $params = [];

    /**
     * 设置参数
     * @param string $params [description]
     */
    public function setParams(string $params)
    {
        $classType = 'menus';
        $classArr = [];

        $typeArray = explode('&', $params);
        foreach ($typeArray as $key => $value) {
            $valueArr = explode('=', $value);
            $dataKey = $valueArr['0'] ?? '';
            $dataVal = $valueArr['1'] ?? '';

            if ($dataKey == 'menu') {
                $classArr = explode('-', $dataVal);
                foreach ($classArr as &$str) {
                    $str = ucfirst($str);
                }
            } else {
                $this->params[$dataKey] = $dataVal;
            }
        }

        $class = "\\App\\Http\\Menus\\" . implode('', $classArr) . 'Menu';
        if (!class_exists($class)) {
            $class = "\\App\\Http\\Menus\\EmptyMenu";
        }

        $this->menu = app($class, [], $this->params);
        $this->menu->postData = array_merge($this->menu->postData, $this->params);
    }

    /**
     * 列表
     * @param  string $type [description]
     * @return [type]       [description]
     */
    public function list()
    {
        $this->setNode();
        return $this->menu->list()->toList();
    }

    public function detail()
    {
        $this->data = $this->menu->detail()->toDetail();
        return true;
    }

    public function info()
    {
        $this->data = $this->menu->info()->toInfo();
        return true;
    }

    private function setNode()
    {
       return true;
    }
}