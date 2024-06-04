<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\DispatchNotification;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\ProductId;

class Item implements NodeInterface
{

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
     * @Serializer\SerializedName("ORDER_REFERENCE")
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\DispatchNotification\OrderReference")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var OrderReference
     */
    protected $orderReference;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("LOGISTIC_DETAILS")
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\DispatchNotification\LogisticDetails")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var LogisticDetails
     */
    
    protected $logisticDetails;

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

    public function getOrderReference(): OrderReference
    {
        return $this->orderReference;
    }

    public function setOrderReference(OrderReference $orderReference): self
    {
        $this->orderReference = $orderReference;
        return $this;
    }

    public function getLogisticDetails(): LogisticDetails
    {
        return $this->logisticDetails;
    }

    public function setLogisticDetails(LogisticDetails $logisticDetails): self
    {
        $this->logisticDetails = $logisticDetails;
        return $this;
    }
    
    
}
