<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\BuyerIdRef;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\SupplierIdRef;
use Naugrim\OpenTrans\Nodes\InvoiceRcptIdRef;
use Naugrim\OpenTrans\Nodes\ShipmentPartiesReference;

class PartiesReference implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\BuyerIdRef")
     * @Serializer\SerializedName("BUYER_IDREF")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var BuyerIdRef
     */
    protected $buyerIdRef;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\SupplierIdRef")
     * @Serializer\SerializedName("SUPPLIER_IDREF")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var SupplierIdRef
     */
    protected $supplierIdRef;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\InvoiceRcptIdRef")
     * @Serializer\SerializedName("INVOICE_RECIPIENT_IDREF")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var InvoiceRcptIdRef
     */
    protected $invoiceRcptIdRef;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\ShipmentPartiesReference")
     * @Serializer\SerializedName("SHIPMENT_PARTIES_REFERENCE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var ShipmentPartiesReference
     */
    protected $shipmentPartiesReference;

    public function getBuyerIdRef(): BuyerIdRef
    {
        return $this->buyerIdRef;
    }

    public function setBuyerIdRef(BuyerIdRef $buyerIdRef): self
    {
        $this->buyerIdRef = $buyerIdRef;
        return $this;
    }

    public function getSupplierIdRef(): SupplierIdRef
    {
        return $this->supplierIdRef;
    }

    public function setSupplierIdRef(SupplierIdRef $supplierIdRef): self
    {
        $this->supplierIdRef = $supplierIdRef;
        return $this;
    }

    public function getInvoiceRcptIdRef(): InvoiceRcptIdRef
    {
        return $this->invoiceRcptIdRef;
    }

    public function setInvoiceRcptIdRef(InvoiceRcptIdRef $invoiceRcptIdRef): self
    {
        $this->invoiceRcptIdRef = $invoiceRcptIdRef;
        return $this;
    }

    public function getShipmentPartiesReference(): ShipmentPartiesReference
    {
        return $this->shipmentPartiesReference;
    }

    public function setShipmentPartiesReference(ShipmentPartiesReference $shipmentPartiesReference): self
    {
        $this->shipmentPartiesReference = $shipmentPartiesReference;
        return $this;
    }
}
