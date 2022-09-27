<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Catalog\Reference;

class SourcingInfo implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("QUOTATION_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $quotationId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Agreement")
     * @Serializer\SerializedName("AGREEMENT")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Agreement
     */
    protected $agreement;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Catalog\Reference")
     * @Serializer\SerializedName("CATALOG_REFERENCE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Reference
     */
    protected $catalogReference;

    public function getQuotationId(): string
    {
        return $this->quotationId;
    }

    public function setQuotationId(string $quotationId): self
    {
        $this->quotationId = $quotationId;
        return $this;
    }

    public function getAgreement(): Agreement
    {
        return $this->agreement;
    }

    public function setAgreement(Agreement $agreement): self
    {
        $this->agreement = $agreement;
        return $this;
    }

    public function getCatalogReference(): Catalog\Reference
    {
        return $this->catalogReference;
    }

    public function setCatalogReference(Catalog\Reference $catalogReference): self
    {
        $this->catalogReference = $catalogReference;
        return $this;
    }
}
