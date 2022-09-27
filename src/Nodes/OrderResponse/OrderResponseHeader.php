<?php

declare(strict_types=1);

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
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var OrderResponseInfo
     */
    protected $orderResponseInfo;

    public function getOrderResponseInfo(): OrderResponseInfo
    {
        return $this->orderResponseInfo;
    }

    public function setOrderResponseInfo(OrderResponseInfo $orderResponseInfo): self
    {
        $this->orderResponseInfo = $orderResponseInfo;
        return $this;
    }
}
