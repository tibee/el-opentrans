<?php

namespace Naugrim\OpenTrans\Nodes\OrderResponse;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Order\PartiesReference;
use Naugrim\OpenTrans\Nodes\Party;

class OrderResponseInfo implements NodeInterface
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
     * @Serializer\SerializedName("ORDERRESPONSE_DATE")
     *
     * @var string
     */
    protected $orderResponseDate;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ORDERCHANGE_SEQUENCE_ID")
     *
     * @var int
     */
    protected $orderChangeSequenceId;

    /**
     *
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
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\PartiesReference")
     * @Serializer\SerializedName("ORDER_PARTIES_REFERENCE")
     *
     * @var PartiesReference
     */
    protected $orderPartiesReference;

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
     * @return OrderResponseInfo
     */
    public function setOrderId(string $orderId): OrderResponseInfo
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderResponseDate(): string
    {
        return $this->orderResponseDate;
    }

    /**
     * @param string $orderResponseDate
     *
     * @return OrderResponseInfo
     */
    public function setOrderResponseDate(string $orderResponseDate): OrderResponseInfo
    {
        $this->orderResponseDate = $orderResponseDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderChangeSequenceId(): int
    {
        return $this->orderChangeSequenceId;
    }

    /**
     * @param int $orderChangeSequenceId
     *
     * @return OrderResponseInfo
     */
    public function setOrderChangeSequenceId(int $orderChangeSequenceId): OrderResponseInfo
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
     * @return OrderResponseInfo
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setParties(array $parties): OrderResponseInfo
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
     * @return OrderResponseInfo
     */
    public function setOrderPartiesReference(PartiesReference $orderPartiesReference): OrderResponseInfo
    {
        $this->orderPartiesReference = $orderPartiesReference;
        return $this;
    }
}