<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class CustomerOrderReference implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDER_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $orderId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LINE_ITEM_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $lineItemId;

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     *
     * @return CustomerOrderReference
     */
    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getLineItemId(): string
    {
        return $this->lineItemId;
    }

    /**
     * @param string $lineItemId
     *
     * @return CustomerOrderReference
     */
    public function setLineItemId(string $lineItemId): self
    {
        $this->lineItemId = $lineItemId;
        return $this;
    }
}
