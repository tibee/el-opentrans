<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\SupplierIdRef;

class Agreement implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("type")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected $type;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("default")
     * @Serializer\XmlAttribute
     *
     * @var bool
     */
    protected $default;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AGREEMENT_ID")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $id;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AGREEMENT_LINE_ID")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $lineId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AGREEMENT_START_DATE")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $startDate;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AGREEMENT_END_DATE")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $endDate;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\SupplierIdRef")
     * @Serializer\SerializedName("SUPPLIER_IDREF")
     * @Serializer\XmlElement(namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var SupplierIdRef
     */
    protected $supplierIdRef;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AGREEMENT_DESCR")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $description;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("MIME_INFO")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Mime>")
     * @Serializer\XmlList(entry = "MIME")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Mime[]
     */
    protected $mimeInfo = [];

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function isDefault(): bool
    {
        return $this->default;
    }

    public function setDefault(bool $default): self
    {
        $this->default = $default;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getLineId(): string
    {
        return $this->lineId;
    }

    public function setLineId(string $lineId): self
    {
        $this->lineId = $lineId;
        return $this;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function getSupplierIdRef(): SupplierIdRef
    {
        return $this->supplierIdRef;
    }

    public function setSupplierIdRef(SupplierIdRef $supplierIdRef): self
    {
        $this->supplierIdRef = $supplierIdRef;
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

    /**
     * @return Mime[]
     */
    public function getMimeInfo(): array
    {
        return $this->mimeInfo;
    }

    /**
     * @param Mime[] $mimeInfos
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setMimeInfo(array $mimeInfos): self
    {
        $this->mimeInfo = [];

        foreach ($mimeInfos as $mimeInfo) {
            if (! $mimeInfo instanceof Mime) {
                /** @var Mime $mimeInfo */
                $mimeInfo = NodeBuilder::fromArray((array) $mimeInfo, new Mime());
            }
            $this->addMimeInfo($mimeInfo);
        }
        return $this;
    }

    public function addMimeInfo(Mime $mimeInfo): self
    {
        $this->mimeInfo[] = $mimeInfo;
        return $this;
    }
}
