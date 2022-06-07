<?php

namespace Naugrim\OpenTrans\Nodes\OrderResponse;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;

/**
 * @Serializer\AccessorOrder("custom", custom = {"controlInfo", "info"})
 */
class OrderResponseHeader implements NodeInterface
{
    use HasControlInfo;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\OrderResponse\OrderResponseInfo")
     * @Serializer\SerializedName("ORDERRESPONSE_INFO")
     *
     * @var OrderResponseInfo
     */
    protected $orderResponseInfo;

    /**
     * @return OrderResponseInfo
     */
    public function getOrderResponseInfo(): OrderResponseInfo
    {
        return $this->orderResponseInfo;
    }

    /**
     * @param OrderResponseInfo $orderResponseInfo
     *
     * @return OrderResponseHeader
     */
    public function setOrderResponseInfo(OrderResponseInfo $orderResponseInfo): OrderResponseHeader
    {
        $this->orderResponseInfo = $orderResponseInfo;
        return $this;
    }
}
