<?php

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\Party;

class OrderInfo implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDER_ID")
     *
     * @var string
     */
    protected $orderId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDER_DATE")
     *
     * @var string
     */
    protected $orderDate;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\DeliveryDate")
     * @Serializer\SerializedName("DELIVERY_DATE")
     *
     * @var DeliveryDate
     */
    protected $deliveryDate;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LANGUAGE")
     *
     * @var string
     */
    protected $language;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("PARTIES")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Party>")
     * @Serializer\XmlList(entry = "PARTY")
     *
     * @var Party[]
     */
    protected $parties = [];

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("CUSTOMER_ORDER_REFERENCE")
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\CustomerOrderReference")
     *
     * @var CustomerOrderReference
     */
    protected $customerOrderReference;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\PartiesReference")
     * @Serializer\SerializedName("ORDER_PARTIES_REFERENCE")
     *
     * @var PartiesReference
     */
    protected $orderPartiesReference;

    /**
     * @Serializer\Expose
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("PARTIAL_SHIPMENT_ALLOWED")
     *
     * @var boolean
     */
    protected $partialShipmentAllowed;

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     *
     * @return OrderInfo
     */
    public function setOrderId(string $orderId): OrderInfo
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

    /**
     * @param string $orderDate
     *
     * @return OrderInfo
     */
    public function setOrderDate(string $orderDate): OrderInfo
    {
        $this->orderDate = $orderDate;
        return $this;
    }

    /**
     * @return DeliveryDate
     */
    public function getDeliveryDate(): DeliveryDate
    {
        return $this->deliveryDate;
    }

    /**
     * @param DeliveryDate $deliveryDate
     *
     * @return $this
     */
    public function setDeliveryDate(DeliveryDate $deliveryDate): self
    {
        $this->deliveryDate = $deliveryDate;
        return $this;
    }

    /**
     * @return Party[]
     */
    public function getParties(): array
    {
        return $this->parties;
    }

    /**
     * @param Party[] $parties
     *
     * @return OrderInfo
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setParties(array $parties): OrderInfo
    {
        foreach ($parties as $party) {
            if (!$party instanceof Party) {
                $party = NodeBuilder::fromArray($party, new Party());
            }
            $this->addParty($party);
        }
        return $this;
    }

    /**
     * @param Party $party
     * @return $this
     */
    public function addParty(Party $party)
    {
        $this->parties[] = $party;
        return $this;
    }

    /**
     * @return PartiesReference
     */
    public function getOrderPartiesReference(): PartiesReference
    {
        return $this->orderPartiesReference;
    }

    /**
     * @param PartiesReference $orderPartiesReference
     *
     * @return OrderInfo
     */
    public function setOrderPartiesReference(PartiesReference $orderPartiesReference): OrderInfo
    {
        $this->orderPartiesReference = $orderPartiesReference;
        return $this;
    }

    /**
     * @param bool $partialShipmentAllowed
     *
     * @return $this
     */
    public function setPartialShipmentAllowed(bool $partialShipmentAllowed): self
    {
        $this->partialShipmentAllowed = $partialShipmentAllowed;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPartialShipmentAllowed(): bool
    {
        return $this->partialShipmentAllowed;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     *
     * @return OrderInfo
     */
    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return CustomerOrderReference
     */
    public function getCustomerOrderReference(): CustomerOrderReference
    {
        return $this->customerOrderReference;
    }

    /**
     * @param CustomerOrderReference $customerOrderReference
     *
     * @return OrderInfo
     */
    public function setCustomerOrderReference(CustomerOrderReference $customerOrderReference): self
    {
        $this->customerOrderReference = $customerOrderReference;
        return $this;
    }
}
