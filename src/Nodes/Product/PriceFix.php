<?php

declare(strict_types=1);

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
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Product\TaxDetailsFix")
     * @Serializer\SerializedName("TAX_DETAILS_FIX")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var TaxDetailsFix
     */
    protected $taxDetailsFix;


    public function getPriceAmount(): float
    {
        return $this->priceAmount;
    }

    public function setPriceAmount(float $priceAmount): self
    {
        $this->priceAmount = $priceAmount;

        return $this;
    }


    public function getTaxDetailsFix(): TaxDetailsFix
    {
        return $this->taxDetailsFix;
    }

    public function setTaxDetailsFix(TaxDetailsFix $taxDetailsFix): self
    {
        r($taxDetailsFix);
        $this->taxDetailsFix = $taxDetailsFix;
        return $this;
    }
}
