<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class DeliveryDate implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected $type;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DELIVERY_START_DATE")
     *
     * @var string
     */
    protected $deliveryStartDate;


    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DELIVERY_END_DATE")
     *
     * @var string
     */
    protected $deliveryEndDate;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getDeliveryStartDate(): string
    {
        return $this->deliveryStartDate;
    }

    public function setDeliveryStartDate(string $deliveryStartDate): self
    {
        $this->deliveryStartDate = $deliveryStartDate;
        return $this;
    }

    public function getDeliveryEndDate(): string
    {
        return $this->deliveryEndDate;
    }

    public function setDeliveryEndDate(string $deliveryEndDate): self
    {
        $this->deliveryEndDate = $deliveryEndDate;
        return $this;
    }

}
