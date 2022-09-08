<?php

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
 *
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
     *
     * @var OrderHeader
     */
    protected $orderHeader;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("ORDER_ITEM_LIST")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Order\Item>")
     * @Serializer\XmlList(entry = "ORDER_ITEM")
     *
     * @var Item[]
     */
    protected $orderItemList = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\OrderSummary")
     * @Serializer\SerializedName("ORDER_SUMMARY")
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

    /**
     * @return OrderHeader
     */
    public function getOrderHeader(): OrderHeader
    {
        return $this->orderHeader;
    }

    /**
     * @param OrderHeader $orderHeader
     *
     * @return Order
     */
    public function setOrderHeader(OrderHeader $orderHeader): Order
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
     * @return Order
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setOrderItemList(array $orderItemList): Order
    {
        foreach ($orderItemList as $item) {
            if (!$item instanceof Item) {
                $item = NodeBuilder::fromArray($item, new Item());
            }
            $this->addItem($item);
        }

        return $this;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): Order
    {
        $this->orderItemList[] = $item;

        return $this;
    }

    /**
     * @return OrderSummary
     */
    public function getOrderSummary(): OrderSummary
    {
        return $this->orderSummary;
    }

    /**
     * @param OrderSummary $orderSummary
     *
     * @return Order
     */
    public function setOrderSummary(OrderSummary $orderSummary): Order
    {
        $this->orderSummary = $orderSummary;

        return $this;
    }
}
