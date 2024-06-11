<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\DispatchNotification\DispatchNotificationHeader;
use Naugrim\OpenTrans\Nodes\DispatchNotification\Item;
use Naugrim\OpenTrans\Nodes\OrderResponse\OrderResponseHeader;

/**
 * @Serializer\XmlRoot("DISPATCHNOTIFICATION")
 * @Serializer\ExclusionPolicy("none")
 * @Serializer\XmlNamespace(uri="http://www.w3.org/2001/XMLSchema", prefix="xsd")
 * @Serializer\XmlNamespace(uri="http://www.w3.org/2001/XMLSchema-instance", prefix="xsi")
 * @Serializer\XmlNamespace(uri="http://www.opentrans.org/XMLSchema/2.1")
 * @Serializer\XmlNamespace(uri="http://www.bmecat.org/bmecat/2005", prefix="bme")
 */
class DispatchNotification implements NodeInterface
{
    use IsRootNode;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\DispatchNotification\DispatchNotificationHeader")
     * @Serializer\SerializedName("DISPATCHNOTIFICATION_HEADER")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var DispatchNotificationHeader
     */
    protected $dispatchNotificationHeader;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("DISPATCHNOTIFICATION_ITEM_LIST")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\DispatchNotification\Item>")
     * @Serializer\XmlList(entry = "DISPATCHNOTIFICATION_ITEM")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Item[]
     */
    protected $dispatchNotificationItemList = [];

    public function getDispatchNotificationHeader(): DispatchNotificationHeader
    {
        return $this->dispatchNotificationHeader;
    }

    public function setDispatchNotificationHeader(DispatchNotificationHeader $dispatchNotificationHeader): self
    {
        $this->dispatchNotificationHeader = $dispatchNotificationHeader;
        return $this;
    }

    /**
     * @return \Naugrim\OpenTrans\Nodes\DispatchNotification\Item[]
     */
    public function getDispatchNotificationItemList(): array
    {
        return $this->dispatchNotificationItemList;
    }

    /**
     * @param Item[] $dispatchNotificationItemList
     *
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setDispatchNotificationItemList(array $dispatchNotificationItemList): self
    {
        foreach ($dispatchNotificationItemList as $item) {
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
        $this->dispatchNotificationItemList[] = $item;
        return $this;
    }
}
