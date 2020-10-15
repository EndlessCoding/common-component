<?php

namespace App\Libs\Menus;

/**
 * 返回值
 */
trait TraitsMenu
{
    public function toList()
    {
        if (!empty($this->operate)) {
            $this->fieldMenu->setField('', '', '操作', 0, '');
        }

        return [
            'data' => [
                'api' => $this->api,
                'showPage' => $this->showPage,
                'fields' => array_values($this->fields),
                'fieldExt' => $this->fieldExt,
                'postData' => $this->postData,
                'event' => empty($this->dataEvent) ? (new \ArrayObject) : $this->dataEvent,
            ],
            'tab' => $this->tab,
            'search' => array_values($this->search),
            'btn' => $this->button,
            'operate' => $this->operate,
        ];
    }

    public function toDetail()
    {
        return [
            // 'fields' => array_values($this->fields),
        ];
    }

    public function toInfo()
    {
        return [
            'api' => $this->api,
            'fields' => array_values($this->fields),
        ];
    }
}