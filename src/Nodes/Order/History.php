<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Agreement;
use Naugrim\OpenTrans\Nodes\Catalog\Reference;

class History implements NodeInterface
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
     * @Serializer\SerializedName("ALT_CUSTOMER_ORDER_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $altCustomerOrderId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SUPPLIER_ORDER_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $supplierOrderId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDER_DATE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $orderDate;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDER_DESCR")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $orderDescr;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DELIVERYNOTE_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $deliverynoteId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DELIVERYNOTE_DATE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $deliverynoteDate;

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

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getAltCustomerOrderId(): string
    {
        return $this->altCustomerOrderId;
    }

    public function setAltCustomerOrderId(string $altCustomerOrderId): self
    {
        $this->altCustomerOrderId = $altCustomerOrderId;
        return $this;
    }

    public function getSupplierOrderId(): string
    {
        return $this->supplierOrderId;
    }

    public function setSupplierOrderId(string $supplierOrderId): self
    {
        $this->supplierOrderId = $supplierOrderId;
        return $this;
    }

    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

    public function setOrderDate(string $orderDate): self
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    public function getOrderDescr(): string
    {
        return $this->orderDescr;
    }

    public function setOrderDescr(string $orderDescr): self
    {
        $this->orderDescr = $orderDescr;
        return $this;
    }

    public function getDeliverynoteId(): string
    {
        return $this->deliverynoteId;
    }

    public function setDeliverynoteId(string $deliverynoteId): self
    {
        $this->deliverynoteId = $deliverynoteId;
        return $this;
    }

    public function getDeliverynoteDate(): string
    {
        return $this->deliverynoteDate;
    }

    public function setDeliverynoteDate(string $deliverynoteDate): self
    {
        $this->deliverynoteDate = $deliverynoteDate;
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

    public function getCatalogReference(): Reference
    {
        return $this->catalogReference;
    }

    public function setCatalogReference(Reference $catalogReference): self
    {
        $this->catalogReference = $catalogReference;
        return $this;
    }
}
