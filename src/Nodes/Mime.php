<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\File\HashValue;
use Naugrim\OpenTrans\Nodes\Mime\Embedded;

class Mime implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_TYPE")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $type;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_SOURCE")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $source;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("FILE_HASH_VALUE")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\File\HashValue>")
     * @Serializer\XmlList(inline = true)
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var HashValue[]
     */
    protected $fileHashValue = [];

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("MIME_EMBEDDED")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Mime\Embedded>")
     * @Serializer\XmlList(entry = "MIME_EMBEDDED")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Embedded[]
     */
    protected $embedded = [];

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_DESCR")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $description;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_ALT")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $alt;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MIME_PURPOSE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $purpose;

    /**
     * @Serializer\Expose
     * @Serializer\Type("int")
     * @Serializer\SerializedName("MIME_ORDER")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var int
     */
    protected $order;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return HashValue[]
     */
    public function getFileHashValue(): array
    {
        return $this->fileHashValue;
    }

    /**
     * @param array<HashValue|array<int|string, mixed>> $fileHashValues
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setFileHashValue(array $fileHashValues): self
    {
        $this->fileHashValue = [];
        foreach ($fileHashValues as $fileHashValue) {
            if (! $fileHashValue instanceof HashValue) {
                /** @var HashValue $fileHashValue */
                $fileHashValue = NodeBuilder::fromArray((array) $fileHashValue, new HashValue());
            }
            $this->addFileHashValue($fileHashValue);
        }
        return $this;
    }

    public function addFileHashValue(HashValue $fileHashValue): self
    {
        $this->fileHashValue[] = $fileHashValue;
        return $this;
    }

    /**
     * @return Embedded[]
     */
    public function getEmbedded(): array
    {
        return $this->embedded;
    }

    /**
     * @param Embedded[] $embeddeds
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setEmbedded(array $embeddeds): self
    {
        $this->embedded = [];
        foreach ($embeddeds as $embedded) {
            if (! $embedded instanceof Embedded) {
                /** @var Embedded $embedded */
                $embedded = NodeBuilder::fromArray((array) $embedded, new Embedded());
            }
            $this->addEmbedded($embedded);
        }
        return $this;
    }

    public function addEmbedded(Embedded $embedded): self
    {
        $this->embedded[] = $embedded;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getAlt(): string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;
        return $this;
    }

    public function getPurpose(): string
    {
        return $this->purpose;
    }

    public function setPurpose(string $purpose): self
    {
        $this->purpose = $purpose;
        return $this;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): self
    {
        $this->order = $order;
        return $this;
    }
}
