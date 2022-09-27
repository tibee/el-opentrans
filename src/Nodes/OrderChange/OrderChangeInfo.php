<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\OrderChange;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Order\PartiesReference;
use Naugrim\OpenTrans\Nodes\Party;

class OrderChangeInfo implements NodeInterface
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
     * @Serializer\SerializedName("ORDERCHANGE_DATE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $orderChangeDate;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDERCHANGE_SEQUENCE_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var int
     */
    protected $orderChangeSequenceId;

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
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\PartiesReference")
     * @Serializer\SerializedName("ORDER_PARTIES_REFERENCE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var PartiesReference
     */
    protected $orderPartiesReference;

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getOrderChangeDate(): string
    {
        return $this->orderChangeDate;
    }

    public function setOrderChangeDate(string $orderChangeDate): self
    {
        $this->orderChangeDate = $orderChangeDate;

        return $this;
    }

    public function getOrderChangeSequenceId(): int
    {
        return $this->orderChangeSequenceId;
    }

    public function setOrderChangeSequenceId(int $orderChangeSequenceId): self
    {
        $this->orderChangeSequenceId = $orderChangeSequenceId;

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
}
