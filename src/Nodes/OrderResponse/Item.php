<?php

namespace Naugrim\OpenTrans\Nodes\OrderResponse;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Product\PriceFix;
use Naugrim\OpenTrans\Nodes\ProductId;

class Item implements NodeInterface
{
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
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $orderUnit;

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
     * @return string
     */
    public function getLineItemId(): string
    {
        return $this->lineItemId;
    }

    /**
     * @param string $lineItemId
     * @return Item
     */
    public function setLineItemId(string $lineItemId): Item
    {
        $this->lineItemId = $lineItemId;
        return $this;
    }

    /**
     * @return ProductId
     */
    public function getProductId(): ProductId
    {
        return $this->productId;
    }

    /**
     * @param ProductId $productId
     * @return Item
     */
    public function setProductId(ProductId $productId): Item
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return Item
     */
    public function setQuantity(float $quantity): Item
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderUnit(): string
    {
        return $this->orderUnit;
    }

    /**
     * @param string $orderUnit
     * @return Item
     */
    public function setOrderUnit(string $orderUnit): Item
    {
        $this->orderUnit = $orderUnit;
        return $this;
    }

    /**
     * @return PriceFix
     */
    public function getProductPriceFix(): PriceFix
    {
        return $this->productPriceFix;
    }

    /**
     * @param PriceFix $productPriceFix
     *
     * @return Item
     */
    public function setProductPriceFix(PriceFix $productPriceFix): Item
    {
        $this->productPriceFix = $productPriceFix;
        return $this;
    }

    /**
     * @return float
     */
    public function getPriceLineAmount(): float
    {
        return $this->priceLineAmount;
    }

    /**
     * @param float $priceLineAmount
     * @return Item
     */
    public function setPriceLineAmount(float $priceLineAmount): Item
    {
        $this->priceLineAmount = $priceLineAmount;
        return $this;
    }
}
