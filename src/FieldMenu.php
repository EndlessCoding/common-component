<?php

namespace App\Libs\Menus;

/**
 * 字段
 * @author chenlong
 */
class FieldMenu extends ComponentMenu
{
    public $field = '';//列对应的字段
    public $type = '';//列对应的字段 text为文本 image为图片
    public $name = '';//列对应的表头名称
    public $width = 0;//列对应的表头宽度
    public $textAlign = 'center';//列对应的字段样式 center居中 left靠左 right靠右
    public $style = [];
    public $tag = 0;//是否显示tag 1-显示 0-不显示
    public $link = [];//超链接,路径和key值 ['path' => '/order/info?id=', 'key' => 'id']

    public function jsonSerialize()
    {
        return [
            'field' => $this->field,
            'type'  => $this->type,
            'name'  => $this->name,
            'style' => empty($this->style) ? (new \ArrayObject) : $this->style,
            'link'  => $this->link,
            'tag'   => $this->tag,
        ];
    }

    private function getFieldObj($field, $type, $name)
    {
        $obj = clone $this;
        $obj->field = $field;
        $obj->type = $type;
        $obj->name = $name;
        return $obj;
    }

    /**
     * 设置样式
     * $type 为 color 则 $field 为颜色字典 [1 => '#ff8a00', 2 => '#008e00', 3 => '#999999']
     * $type 为 textAlign 则 $field 为 left、center、right
     * $type 为 width 则 $field 为 宽度具体值
     * $type 为 class 则 $field 为 class具体值
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

    /**
     * 设置超链接
     * @param [type] $path [description]
     * @param [type] $key  [description]
     */
    public function setLink($path, $key)
    {
        $this->link = [
            'path' => $path,
            'key'  => $key,
        ];
        return $this;
    }

    /**
     * 设置标签
     */
    public function setTag()
    {
        $this->tag = 1;
    }

    public function setField($field, $type, $name)
    {
        $this->baseMenu->fields[$field] = $this->getFieldObj($field, $type, $name);
        return $this->baseMenu->fields[$field];
    }

    public function unsetField(array $fields)
    {
        foreach ($this->baseMenu->fields as $key => $value) {
            if (in_array($value->field, $fields)) {
                unset($this->baseMenu->fields[$key]);
            }
        }

        $this->baseMenu->fields = array_values($this->baseMenu->fields);
    }

    public function setFieldExt($col, $field, $type, $name, $width = 0)
    {
        $this->baseMenu->fieldExt[$col][] = $this->getFieldObj($field, $type, $name, $width, '');
        return $this;
    }
}