<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\IsRootNode;
use Naugrim\OpenTrans\Nodes\Invoice\Header;
use Naugrim\OpenTrans\Nodes\Invoice\Item;
use Naugrim\OpenTrans\Nodes\Invoice\Summary;

/**
 * @Serializer\XmlRoot("INVOICE")
 * @Serializer\ExclusionPolicy("all")
 * @Serializer\XmlNamespace(uri="http://www.opentrans.org/XMLSchema/2.1")
 * @Serializer\XmlNamespace(uri="http://www.bmecat.org/bmecat/2005", prefix="bme")
 */
class Invoice implements NodeInterface
{
    use IsRootNode;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Invoice\Header")
     * @Serializer\SerializedName("INVOICE_HEADER")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Header
     */
    protected $header;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("INVOICE_ITEM_LIST")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Invoice\Item>")
     * @Serializer\XmlList(entry = "INVOICE_ITEM")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Item[]
     */
    protected $items = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Invoice\Summary")
     * @Serializer\SerializedName("INVOICE_SUMMARY")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Summary
     */
    protected $summary;

    public function getHeader(): Header
    {
        return $this->header;
    }

    public function setHeader(Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setItems(array $items): self
    {
        foreach ($items as $item) {
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
        $this->items[] = $item;
        return $this;
    }

    public function getSummary(): Summary
    {
        return $this->summary;
    }

    public function setSummary(Summary $summary): self
    {
        $this->summary = $summary;
        return $this;
    }
}
