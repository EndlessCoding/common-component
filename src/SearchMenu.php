<?php

namespace App\Libs\Menus;

/**
 * 列表数据
 * @author chenlong
 */
class SearchMenu extends ComponentMenu
{
    public $title = '';//表单默认值
    /**
     * multi 表示多个值 配置取 extData
     * text 文本输入框
     * select 下拉选择框
     * checkbox 多项选择
     * date 日期
     * region-control 地区和商圈关联 (提交字段：region cate_circle)
     * dept-control 部门和用户关联 (提交字段：departmentId userid)
     *
     */
    public $type = '';//表单类型 text select checkbox multi(name=date是日期控件) date(单个日期控件)


    public $name = '';//提交字段
    public $value = '';//表单值
    public $width = 50;//宽度
    public $data = [];//select等的选项值
    public $style = [];//样式 二维数组

    /**
     * 扩展字段
     * @var array
     *
        {
            'type' => 'text',
            'name' => 'min',
            'value' => '',
            'width' => 80,
        },
        {
            'type' => 'text',
            'name' => 'min',
            'value' => '',
            'width' => 80,
        },
     *
     */
    public $extData = [];

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'type' => $this->type,
            'name' => $this->name,
            'value' => $this->value,
            'style' => $this->style,
            'data' => array_map(function($val) {
                return ['id' => $val['id'], 'name' => $val['name']];
            }, $this->data),
            'extData' => $this->extData,
        ];
    }

    /**
     * 设置搜索项
     * @param [type] $title 表单默认值
     * @param [type] $type  表单类型 text select checkbox
     * @param [type] $name  提交字段
     * @param [type] $data  表单值
     */
    public function setSearch($title, $type, $name, $data = [], $value = '')
    {
        $obj = clone $this;
        $obj->title = $title;
        $obj->type = $type;
        $obj->name = $name;
        $obj->value = $value;
        $obj->data = $data;
        $this->baseMenu->search[$name] = $obj;
        return $obj;
    }

    // public function unsetSearch(array $fields, array $ids)
    // {
    //     foreach ($fields as $field) {
    //         if (isset($this->baseMenu->search[$field])) {
    //             if (empty($ids)) {
    //                 unset($this->baseMenu->search[$field]);
    //             } else {
    //                 foreach ($this->baseMenu->search[$field]['data'] as $key => $value) {
    //                     if (in_array($value['id'], $ids)) {
    //                         unset($this->baseMenu->search[$field]['data'][$key]);
    //                     }
    //                 }
    //                 $this->baseMenu->search[$field]['data'] = array_values($this->baseMenu->search[$field]['data']);
    //             }
    //         }
    //     }
    // }

    /**
     * 设置扩展
     * @param [type]  $type  [description]
     * @param [type]  $name  [description]
     * @param array   $data  [description]
     * @param string  $value [description]
     * @param integer $width [description]
     */
    public function setExt($type, $name, $data = [], $value = '', $title = '')
    {
        $this->extData[] = [
            'title' => $title,
            'type' => $type,
            'name' => $name,
            'data' => $data,
            'value' => $value,
        ];
        return $this;
    }

    /**
     * 设置样式 （用法参考 fieldMenu 中的 setStyle 方法）
     * @param array  $dict  [description]
     */
    public function setStyle(string $type, $dict)
    {
        $this->style[] = [
            'type' => $type,
            'dict' => $dict,
        ];
        return $this;
    }
}