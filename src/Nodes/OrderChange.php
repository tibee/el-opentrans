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
use Naugrim\OpenTrans\Nodes\Order\OrderSummary;
use Naugrim\OpenTrans\Nodes\OrderChange\OrderChangeHeader;

/**
 * @Serializer\XmlRoot("ORDERCHANGE")
 * @Serializer\ExclusionPolicy("all")
 * @Serializer\XmlNamespace(uri="http://www.opentrans.org/XMLSchema/2.1")
 * @Serializer\XmlNamespace(uri="http://www.bmecat.org/bmecat/2005", prefix="bme")
 */
class OrderChange implements NodeInterface
{
    use IsRootNode;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\OrderChange\OrderChangeHeader")
     * @Serializer\SerializedName("ORDERCHANGE_HEADER")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var OrderChangeHeader
     */
    protected $orderChangeHeader;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("ORDERCHANGE_ITEM_LIST")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Order\Item>")
     * @Serializer\XmlList(entry = "ORDER_ITEM")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Item[]
     */
    protected $orderChangeItemList = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\OrderSummary")
     * @Serializer\SerializedName("ORDERCHANGE_SUMMARY")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var OrderSummary
     */
    protected $orderChangeSummary;

    public function getOrderChangeHeader(): OrderChangeHeader
    {
        return $this->orderChangeHeader;
    }

    public function setOrderChangeHeader(OrderChangeHeader $orderChangeHeader): self
    {
        $this->orderChangeHeader = $orderChangeHeader;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getOrderChangeItemList(): array
    {
        return $this->orderChangeItemList;
    }

    /**
     * @param Item[] $orderChangeItemList
     *
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setOrderChangeItemList(array $orderChangeItemList): self
    {
        foreach ($orderChangeItemList as $item) {
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
        $this->orderChangeItemList[] = $item;
        return $this;
    }

    public function getOrderChangeSummary(): OrderSummary
    {
        return $this->orderChangeSummary;
    }

    public function setOrderChangeSummary(OrderSummary $orderChangeSummary): self
    {
        $this->orderChangeSummary = $orderChangeSummary;
        return $this;
    }
}
