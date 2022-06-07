<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;
use Naugrim\OpenTrans\Nodes\Concerns\HasSourcingInfo;
use Naugrim\OpenTrans\Nodes\SourcingInfo;

/**
 * @Serializer\AccessorOrder("custom", custom = {"controlInfo", "sourcingInfo", "info"})
 */
class OrderHeader implements NodeInterface
{
    use HasControlInfo, HasSourcingInfo;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\OrderInfo")
     * @Serializer\SerializedName("ORDER_INFO")
     *
     * @var OrderInfo
     */
    protected $orderInfo;

    /**
     * @return OrderInfo
     */
    public function getOrderInfo(): OrderInfo
    {
        return $this->orderInfo;
    }

    /**
     * @param OrderInfo $orderInfo
     *
     * @return OrderHeader
     */
    public function setOrderInfo(OrderInfo $orderInfo): OrderHeader
    {
        $this->orderInfo = $orderInfo;
        return $this;
    }

    /**
     * @return SourcingInfo
     */
    public function getSourcingInfo(): SourcingInfo
    {
        return $this->sourcingInfo;
    }

    /**
     * @param SourcingInfo $sourcingInfo
     *
     * @return OrderHeader
     */
    public function setSourcingInfo(SourcingInfo $sourcingInfo): OrderHeader
    {
        $this->sourcingInfo = $sourcingInfo;
        return $this;
    }
}
