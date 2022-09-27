<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\Order\Item;
use Naugrim\OpenTrans\Nodes\Order\OrderHeader;
use Naugrim\OpenTrans\Nodes\Order\OrderSummary;

/**
 * @Serializer\XmlRoot("ORDER")
 * @Serializer\ExclusionPolicy("all")
 * @Serializer\XmlNamespace(uri="http://www.opentrans.org/XMLSchema/2.1")
 * @Serializer\XmlNamespace(uri="http://www.bmecat.org/bmecat/2005", prefix="bme")
 */
class Order implements NodeInterface
{
    use IsRootNode;

    /**
     * @Serializer\Expose
     * @Serializer\XmlAttribute
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $type = 'standard';

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\OrderHeader")
     * @Serializer\SerializedName("ORDER_HEADER")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var OrderHeader
     */
    protected $orderHeader;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("ORDER_ITEM_LIST")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Order\Item>")
     * @Serializer\XmlList(entry = "ORDER_ITEM")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Item[]
     */
    protected $orderItemList = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\OrderSummary")
     * @Serializer\SerializedName("ORDER_SUMMARY")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var OrderSummary
     */
    protected $orderSummary;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Order
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getOrderHeader(): OrderHeader
    {
        return $this->orderHeader;
    }

    public function setOrderHeader(OrderHeader $orderHeader): self
    {
        $this->orderHeader = $orderHeader;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getOrderItemList(): array
    {
        return $this->orderItemList;
    }

    /**
     * @param Item[] $orderItemList
     *
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setOrderItemList(array $orderItemList): self
    {
        foreach ($orderItemList as $item) {
            if (! $item instanceof Item) {
                /** @var Item $item */
                $item = NodeBuilder::fromArray((array) $item, new Item());
            }
            $this->addItem($item);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function addItem(Item $item): self
    {
        $this->orderItemList[] = $item;

        return $this;
    }

    public function getOrderSummary(): OrderSummary
    {
        return $this->orderSummary;
    }

    public function setOrderSummary(OrderSummary $orderSummary): self
    {
        $this->orderSummary = $orderSummary;

        return $this;
    }
}
