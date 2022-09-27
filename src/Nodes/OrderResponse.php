<?php

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\OrderResponse\Item;
use Naugrim\OpenTrans\Nodes\OrderResponse\OrderResponseHeader;
use Naugrim\OpenTrans\Nodes\OrderResponse\OrderResponseSummary;

/**
 *
 * @Serializer\XmlRoot("ORDERRESPONSE")
 * @Serializer\ExclusionPolicy("all")
 * @Serializer\XmlNamespace(uri="http://www.opentrans.org/XMLSchema/2.1")
 * @Serializer\XmlNamespace(uri="http://www.bmecat.org/bmecat/2005", prefix="bme")
 */
class OrderResponse implements NodeInterface
{
    use IsRootNode;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\OrderResponse\OrderResponseHeader")
     * @Serializer\SerializedName("ORDERRESPONSE_HEADER")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var OrderResponseHeader
     */
    protected $orderResponseHeader;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("ORDERRESPONSE_ITEM_LIST")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\OrderResponse\Item>")
     * @Serializer\XmlList(entry = "ORDERRESPONSE_ITEM")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Item[]
     */
    protected $orderResponseItemList = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\OrderResponse\OrderResponseSummary")
     * @Serializer\SerializedName("ORDERRESPONSE_SUMMARY")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var OrderResponseSummary
     */
    protected $orderResponseSummary;

    /**
     * @return OrderResponseHeader
     */
    public function getOrderResponseHeader(): OrderResponseHeader
    {
        return $this->orderResponseHeader;
    }

    /**
     * @param OrderResponseHeader $orderResponseHeader
     *
     * @return OrderResponse
     */
    public function setOrderResponseHeader(OrderResponseHeader $orderResponseHeader): OrderResponse
    {
        $this->orderResponseHeader = $orderResponseHeader;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getOrderResponseItemList(): array
    {
        return $this->orderResponseItemList;
    }

    /**
     * @param Item[] $orderResponseItemList
     *
     * @return OrderResponse
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setOrderResponseItemList(array $orderResponseItemList): OrderResponse
    {
        foreach ($orderResponseItemList as $item) {
            if (!$item instanceof Item) {
                /** @var Item $item */
                $item = NodeBuilder::fromArray((array)$item, new Item());
            }
            $this->addItem($item);
        }
        return $this;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): OrderResponse
    {
        $this->orderResponseItemList[] = $item;
        return $this;
    }

    /**
     * @return OrderResponseSummary
     */
    public function getOrderResponseSummary(): OrderResponseSummary
    {
        return $this->orderResponseSummary;
    }

    /**
     * @param OrderResponseSummary $orderResponseSummary
     *
     * @return OrderResponse
     */
    public function setOrderResponseSummary(OrderResponseSummary $orderResponseSummary): OrderResponse
    {
        $this->orderResponseSummary = $orderResponseSummary;
        return $this;
    }
}
