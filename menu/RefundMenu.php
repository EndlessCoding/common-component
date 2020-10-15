<?php

namespace App\Http\Menus;

/**
 * 退货退款(仅退款)
 * @author chenlong
 */
class RefundMenu extends BaseMenu
{
    public function list()
    {
        $this->api = 'v2/order/list';

        $this->fieldMenu->setField('id', 'text', '序号');
        $this->fieldMenu->setField('created_at', 'text', '创建日期');
        $this->fieldMenu->setField('refund_no', 'text', '退款编号');
        $this->fieldMenu->setField('order_no', 'text', '订单编号')
                        ->setLink('/ypc/order/info?id=', 'id');
        $this->fieldMenu->setField('erp_refund_no', 'text', 'ERP退款编号');
        $this->fieldMenu->setField('ypc_user.phone', 'text', '用户');
        $this->fieldMenu->setField('orders_goods_mapping.goods_name', 'text', '商品名称');
        $this->fieldMenu->setField('refund_amount', 'text', '退款金额')
                        ->setStyle('class', 'ypc-status-warning');
        $this->fieldMenu->setField('refund_type_name', 'text', '售后类型&原因');
        $this->fieldMenu->setField('refund_explain', 'text', '退款说明');
        $this->fieldMenu->setField('second_audit_remark', 'text', '仓库备注');
        $this->fieldMenu->setField('source', 'text', '退款单来源');
        $this->fieldMenu->setField('initiator_name', 'text', '发起人');
        $this->fieldMenu->setField('refund_pay_type_name', 'text', '退款方式');
        $this->fieldMenu->setField('status_name', 'text', '退款状态');
        $this->fieldMenu->setField('express_no', 'text', '快递单号');
        $this->fieldMenu->setField('evidence_photo', 'image', '退款图片');
        $this->fieldMenu->setField('express_no_photo', 'image', '快递单号图片');
        $this->fieldMenu->setField('receive_photo', 'image', '收款码图片');
        $this->fieldMenu->setField('admin_name', 'text', '初次审核人');
        $this->fieldMenu->setField('audit_admin_name', 'text', '再次审核人');

        $this->searchMenu->setSearch('退款编号', 'text', 'refund_no', $data = []);
        $this->searchMenu->setSearch('订单编号', 'text', 'order_no', $data = []);
        $this->searchMenu->setSearch('运单号', 'text', 'express_no', $data = []);
        $this->searchMenu->setSearch('手机号', 'text', 'phone', $data = []);

        $data = [
            ['name' => '不限', 'id' => 0],
            ['name' => '微信', 'id' => 2],
            ['name' => '支付宝', 'id' => 1],
        ];
        $this->searchMenu->setSearch('退款支付类型', 'select', 'refund_pay_type', $data);

        $data = [
            ['name' => '不限', 'id' => 0],
            ['name' => '待审核', 'id' => '10'],
            ['name' => '退款中', 'id' => '20'],
            ['name' => '待填写运单号', 'id' => '30'],
            ['name' => '仓库审核通过', 'id' => '40'],
            ['name' => '退款完成', 'id' => '70'],
            ['name' => '申请取消', 'id' => '80'],
            ['name' => '拒绝退款', 'id' => '50'],
        ];
        $this->searchMenu->setSearch('退款状态', 'select', 'refund_status', $data);
        $this->searchMenu->setSearch('订单编号', 'text', 'order_no');

        $obj = $this->searchMenu->setSearch('', 'multi', '');
        $obj->setExt('date', 'start', [], $value = '', '开始日期');
        $obj->setExt('date', 'end', [], $value = '', '结束日期');

        return $this;
    }

    public function detail()
    {
        return $this;
    }

    public function info()
    {
        $this->api = 'v2/order/list';

        $this->fieldMenu->setField('source', 'text', '来源');
        $this->fieldMenu->setField('title', 'text', '标题', 380, 'left')
            ->setStyle()
            ->setTag();
        $this->fieldMenu->setField('houseRoom', 'text', '房型');
        $this->fieldMenu->setField('mj', 'text', '面积(m²)');
        $this->fieldMenu->setField('cx', 'text', '朝向');
        $this->fieldMenu->setField('zxcd', 'text', '装修');
        $this->fieldMenu->setField('salePrice', 'text', '售总价');
        $this->fieldMenu->setField('unitPrice', 'text', '单价');
        $this->fieldMenu->setField('rentPrice', 'text', '租价');
        $this->fieldMenu->setField('signStatusName', 'text', '状态');

        return $this;
    }
}