<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasUdxItems;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\Product\PriceFix;
use Naugrim\OpenTrans\Nodes\ProductId;

class Item implements NodeInterface
{
    use HasUdxItems;

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
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\ProductId")
     * @Serializer\SerializedName("PRODUCT_ID")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var ProductId
     */
    protected $productId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("QUANTITY")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var float
     */
    protected $quantity;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDER_UNIT")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $orderUnit;

    /**
     * @Serializer\Expose
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("PARTIAL_SHIPMENT_ALLOWED")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var boolean
     */
    protected $partialShipmentAllowed;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\DeliveryDate")
     * @Serializer\SerializedName("DELIVERY_DATE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var DeliveryDate
     */
    protected $deliveryDate;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Product\PriceFix")
     * @Serializer\SerializedName("PRODUCT_PRICE_FIX")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var PriceFix
     */
    protected $productPriceFix;

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PRICE_LINE_AMOUNT")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var float
     */
    protected $priceLineAmount;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\CustomerOrderReference")
     * @Serializer\SerializedName("CUSTOMER_ORDER_REFERENCE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var CustomerOrderReference
     */
    protected $customerOrderReference;

    public function getLineItemId(): string
    {
        return $this->lineItemId;
    }

    public function setLineItemId(string $lineItemId): self
    {
        $this->lineItemId = $lineItemId;
        return $this;
    }

    public function getProductId(): ProductId
    {
        return $this->productId;
    }

    public function setProductId(ProductId $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getOrderUnit(): string
    {
        return $this->orderUnit;
    }

    public function setOrderUnit(string $orderUnit): self
    {
        $this->orderUnit = $orderUnit;
        return $this;
    }

    public function getProductPriceFix(): PriceFix
    {
        return $this->productPriceFix;
    }

    public function setProductPriceFix(PriceFix $productPriceFix): self
    {
        $this->productPriceFix = $productPriceFix;
        return $this;
    }

    public function getPriceLineAmount(): float
    {
        return $this->priceLineAmount;
    }

    public function setPriceLineAmount(float $priceLineAmount): self
    {
        $this->priceLineAmount = $priceLineAmount;
        return $this;
    }

    public function getDeliveryDate(): DeliveryDate
    {
        return $this->deliveryDate;
    }

    /**
     * @return $this
     */
    public function setDeliveryDate(DeliveryDate $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * @return $this
     */
    public function setPartialShipmentAllowed(bool $partialShipmentAllowed): self
    {
        $this->partialShipmentAllowed = $partialShipmentAllowed;
        return $this;
    }

    public function isPartialShipmentAllowed(): bool
    {
        return $this->partialShipmentAllowed;
    }

    public function getCustomerOrderReference(): CustomerOrderReference
    {
        return $this->customerOrderReference;
    }

    public function setCustomerOrderReference(CustomerOrderReference $customerOrderReference): void
    {
        $this->customerOrderReference = $customerOrderReference;
    }
}
