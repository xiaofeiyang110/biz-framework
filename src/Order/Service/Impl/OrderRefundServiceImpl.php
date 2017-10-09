<?php

namespace Codeages\Biz\Framework\Order\Service\Impl;

use Codeages\Biz\Framework\Order\Service\OrderRefundService;
use Codeages\Biz\Framework\Service\BaseService;
use Codeages\Biz\Framework\Service\Exception\AccessDeniedException;
use Codeages\Biz\Framework\Util\ArrayToolkit;

class OrderRefundServiceImpl extends BaseService implements OrderRefundService
{
    public function getOrderRefundById($id)
    {
        return $this->getOrderRefundDao()->get($id);
    }
    
    public function searchRefunds($conditions, $orderby, $start, $limit)
    {
        return $this->getOrderRefundDao()->search($conditions, $orderby, $start, $limit);
    }

    public function countRefunds($conditions)
    {
        return $this->getOrderRefundDao()->count($conditions);
    }

    public function findRefundsByOrderIds($orderIds)
    {
        return $this->getOrderRefundDao()->findByOrderIds($orderIds);
    }

    public function searchRefundItems($conditions, $orderby, $start, $limit)
    {
        return $this->getOrderItemRefundDao()->search($conditions, $orderby, $start, $limit);
    }

    public function countRefundItems($conditions)
    {
        return $this->getOrderItemRefundDao()->count($conditions);
    }

    public function findOrderItemRefundsByOrderRefundId($orderRefundId)
    {
        return $this->getOrderItemRefundDao()->findByOrderRefundId($orderRefundId);
    }

    protected function getOrderRefundDao()
    {
        return $this->biz->dao('Order:OrderRefundDao');
    }

    protected function getOrderItemRefundDao()
    {
        return $this->biz->dao('Order:OrderItemRefundDao');
    }
}