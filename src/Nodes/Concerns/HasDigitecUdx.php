<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Concerns;

trait HasDigitecUdx
{

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("UDX.DG.CUSTOMER_TYPE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $udxDgCustomerType;
    
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("UDX.DG.DELIVERY_TYPE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $udxDgDeliveryType;
    
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("UDX.DG.SATURDAY_DELIVERY_ALLOWED")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $udxDgSaturdayDeliveryAllowed;
    
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("UDX.DG.IS_COLLECTIVE_ORDER")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $udxDgIsCollectiveOrder;
    
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("UDX.DG.END_CUSTOMER_ORDER_REFERENCE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $udxDgEndCustomerOrderReference;
    
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("UDX.DG.PHYSICAL_DELIVERY_NOTE_REQUIRED")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $udxDgPhysicalDeliveryNoteRequired;

    public function getUdxDgCustomerType(): string
    {
        return $this->udxDgCustomerType;
    }

    public function setUdxDgCustomerType(string $string): self
    {
        $this->udxDgCustomerType = $string;
        return $this;
    }
    
    public function getUdxDgDeliveryType(): string
    {
        return $this->udxDgDeliveryType;
    }
    
    public function setUdxDgDeliveryType(string $string): self
    {
        $this->udxDgDeliveryType = $string;
        return $this;
    }
    
    public function getUdxDgSaturdayDeliveryAllowed(): string
    {
        return $this->udxDgSaturdayDeliveryAllowed;
    }
    
    public function setUdxDgSaturdayDeliveryAllowed(string $string): self
    {
        $this->udxDgSaturdayDeliveryAllowed = $string;
        return $this;
    }
    
    public function getUdxDgIsCollectiveOrder(): string
    {
        return $this->udxDgIsCollectiveOrder;
    }
    
    public function setUdxDgIsCollectiveOrder(string $string): self
    {
        $this->udxDgIsCollectiveOrder = $string;
        return $this;
    }
    
    public function getUdxDgEndCustomerOrderReference(): string
    {
        return $this->udxDgEndCustomerOrderReference;
    }
    
    public function setUdxDgEndCustomerOrderReference(string $string): self
    {
        $this->udxDgEndCustomerOrderReference = $string;
        return $this;
    }
    
    public function getUdxDgPhysicalDeliveryNoteRequired(): string
    {
        return $this->udxDgPhysicalDeliveryNoteRequired;
    }
    
    public function setUdxDgPhysicalDeliveryNoteRequired(string $string): self
    {
        $this->udxDgPhysicalDeliveryNoteRequired = $string;
        return $this;
    }
    
}
