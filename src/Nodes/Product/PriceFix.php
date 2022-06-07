<?php

namespace Naugrim\OpenTrans\Nodes\Product;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class PriceFix implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PRICE_AMOUNT")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var float
     */
    protected $priceAmount;

    /**
     * @return float
     */
    public function getPriceAmount(): float
    {
        return $this->priceAmount;
    }

    /**
     * @param float $priceAmount
     *
     * @return PriceFix
     */
    public function setPriceAmount(float $priceAmount): PriceFix
    {
        $this->priceAmount = $priceAmount;

        return $this;
    }
}
