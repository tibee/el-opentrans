<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\DeliveryDate;
use Naugrim\OpenTrans\Nodes\Party;
use Naugrim\OpenTrans\Nodes\Payment\Payment;

class OrderInfo implements NodeInterface
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
     * @Serializer\SerializedName("ORDER_DATE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $orderDate;

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
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LANGUAGE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $language;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("PARTIES")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Party>")
     * @Serializer\XmlList(entry = "PARTY")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Party[]
     */
    protected $parties = [];

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("CUSTOMER_ORDER_REFERENCE")
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\CustomerOrderReference")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var CustomerOrderReference
     */
    protected $customerOrderReference;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\PartiesReference")
     * @Serializer\SerializedName("ORDER_PARTIES_REFERENCE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var PartiesReference
     */
    protected $orderPartiesReference;

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
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Payment\Payment")
     * @Serializer\SerializedName("PAYMENT")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Payment
     */
    protected $payment;

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;
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
     * @return Party[]
     */
    public function getParties(): array
    {
        return $this->parties;
    }

    /**
     * @param Party[] $parties
     *
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setParties(array $parties): self
    {
        foreach ($parties as $party) {
            if (! $party instanceof Party) {
                /** @var Party $party */
                $party = NodeBuilder::fromArray((array) $party, new Party());
            }
            $this->addParty($party);
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function addParty(Party $party)
    {
        $this->parties[] = $party;
        return $this;
    }

    public function getOrderPartiesReference(): PartiesReference
    {
        return $this->orderPartiesReference;
    }

    public function setOrderPartiesReference(PartiesReference $orderPartiesReference): self
    {
        $this->orderPartiesReference = $orderPartiesReference;
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

    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return OrderInfo
     */
    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function getCustomerOrderReference(): CustomerOrderReference
    {
        return $this->customerOrderReference;
    }

    /**
     * @return OrderInfo
     */
    public function setCustomerOrderReference(CustomerOrderReference $customerOrderReference): self
    {
        $this->customerOrderReference = $customerOrderReference;
        return $this;
    }

    public function getPayment(): Payment
    {
        return $this->payment;
    }

    public function setPayment(Payment $payment): self
    {
        $this->payment = $payment;
        return $this;
    }
}
