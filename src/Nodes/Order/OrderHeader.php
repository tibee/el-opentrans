<?php

declare(strict_types=1);

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
    use HasControlInfo;
    use HasSourcingInfo;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\OrderInfo")
     * @Serializer\SerializedName("ORDER_INFO")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var OrderInfo
     */
    protected $orderInfo;

    public function getOrderInfo(): OrderInfo
    {
        return $this->orderInfo;
    }

    public function setOrderInfo(OrderInfo $orderInfo): self
    {
        $this->orderInfo = $orderInfo;
        return $this;
    }

    public function getSourcingInfo(): SourcingInfo
    {
        return $this->sourcingInfo;
    }

    public function setSourcingInfo(SourcingInfo $sourcingInfo): self
    {
        $this->sourcingInfo = $sourcingInfo;
        return $this;
    }
}
