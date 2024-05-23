<?php

declare(strict_types=1);

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
 * @Serializer\XmlRoot("ORDERRESPONSE")
 * @Serializer\ExclusionPolicy("all")
 * @Serializer\XmlNamespace(uri="http://www.w3.org/2001/XMLSchema", prefix="xsd")
 * @Serializer\XmlNamespace(uri="http://www.w3.org/2001/XMLSchema-instance", prefix="xsi")
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

    public function getOrderResponseHeader(): OrderResponseHeader
    {
        return $this->orderResponseHeader;
    }

    public function setOrderResponseHeader(OrderResponseHeader $orderResponseHeader): self
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
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setOrderResponseItemList(array $orderResponseItemList): self
    {
        foreach ($orderResponseItemList as $item) {
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
        $this->orderResponseItemList[] = $item;
        return $this;
    }

    public function getOrderResponseSummary(): OrderResponseSummary
    {
        return $this->orderResponseSummary;
    }

    public function setOrderResponseSummary(OrderResponseSummary $orderResponseSummary): self
    {
        $this->orderResponseSummary = $orderResponseSummary;
        return $this;
    }
}
