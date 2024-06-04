<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\DispatchNotification;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Party;

class DispatchNotificationInfo implements NodeInterface
{
    
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DISPATCHNOTIFICATION_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $dispatchNotificationId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DISPATCHNOTIFICATION_DATE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $dispatchNotificationDate;

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
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SHIPMENT_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $shipmentId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SHIPMENT_CARRIER")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $shipmentCarrier;
    
    public function getDispatchNotificationId(): string
    {
        return $this->dispatchNotificationId;
    }

    public function setDispatchNotificationId(string $dispatchNotificationId): self
    {
        $this->dispatchNotificationId = $dispatchNotificationId;
        return $this;
    }

    public function getDispatchNotificationDate(): string
    {
        return $this->dispatchNotificationDate;
    }

    public function setDispatchNotificationDate(string $dispatchNotificationDate): self
    {
        $this->dispatchNotificationDate = $dispatchNotificationDate;
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

    public function getShipmentId(): string
    {
        return $this->shipmentId;
    }

    public function setShipmentId(string $shipmentId): self
    {
        $this->shipmentId = $shipmentId;
        return $this;
    }

    public function getShipmentCarrier(): string
    {
        return $this->shipmentCarrier;
    }

    public function setShipmentCarrier(string $shipmentCarrier): self
    {
        $this->shipmentCarrier = $shipmentCarrier;
        return $this;
    }
  
}
