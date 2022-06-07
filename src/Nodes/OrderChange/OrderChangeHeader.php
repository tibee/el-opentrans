<?php

namespace Naugrim\OpenTrans\Nodes\OrderChange;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;
use Naugrim\OpenTrans\Nodes\ControlInfo;

/**
 * @Serializer\AccessorOrder("custom", custom = {"controlInfo", "info"})
 */
class OrderChangeHeader implements NodeInterface
{
    use HasControlInfo;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\OrderChange\OrderChangeInfo")
     * @Serializer\SerializedName("ORDERCHANGE_INFO")
     *
     * @var OrderChangeInfo
     */
    protected $orderChangeInfo;

    /**
     * @return OrderChangeInfo
     */
    public function getOrderChangeInfo(): OrderChangeInfo
    {
        return $this->orderChangeInfo;
    }

    /**
     * @param OrderChangeInfo $orderChangeInfo
     *
     * @return OrderChangeHeader
     */
    public function setOrderChangeInfo(OrderChangeInfo $orderChangeInfo): OrderChangeHeader
    {
        $this->orderChangeInfo = $orderChangeInfo;

        return $this;
    }
}
