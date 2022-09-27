<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class AllowOrChargeValue implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("AOC_PERCENTAGE_FACTOR")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var float
     */
    protected $percentageFactor;

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("AOC_MONETARY_AMOUNT")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var float
     */
    protected $monetaryAmount;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\AocOrderUnitsCount")
     * @Serializer\SerializedName("AOC_ORDER_UNITS_COUNT")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var AocOrderUnitsCount
     */
    protected $orderUnitsCount;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AOC_ADDITIONAL_ITEMS")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $additionalItems;

    public function getPercentageFactor(): float
    {
        return $this->percentageFactor;
    }

    public function setPercentageFactor(float $percentageFactor): self
    {
        $this->percentageFactor = $percentageFactor;
        return $this;
    }

    public function getMonetaryAmount(): float
    {
        return $this->monetaryAmount;
    }

    public function setMonetaryAmount(float $monetaryAmount): self
    {
        $this->monetaryAmount = $monetaryAmount;
        return $this;
    }

    public function getOrderUnitsCount(): AocOrderUnitsCount
    {
        return $this->orderUnitsCount;
    }

    public function setOrderUnitsCount(AocOrderUnitsCount $orderUnitsCount): self
    {
        $this->orderUnitsCount = $orderUnitsCount;
        return $this;
    }

    public function getAdditionalItems(): string
    {
        return $this->additionalItems;
    }

    public function setAdditionalItems(string $additionalItems): self
    {
        $this->additionalItems = $additionalItems;
        return $this;
    }
}
