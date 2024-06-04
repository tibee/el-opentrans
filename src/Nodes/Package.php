<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

/**
 * @Serializer\XmlRoot("PACKAGE")
 */
class Package implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PACKAGE_ID")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $packageId;

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PACKAGE_ORDER_UNIT_QUANTITY")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var float
     */
    protected $packageOrderUnitQuantity;

    public function getPackageId(): string
    {
        return $this->packageId;
    }

    public function setPackageId(string $packageId): self
    {
        $this->packageId = $packageId;
        return $this;
    }

    public function getPackageOrderUnitQuantity(): float
    {
        return $this->packageOrderUnitQuantity;
    }

    public function setPackageOrderUnitQuantity(float $packageOrderUnitQuantity): self
    {
        $this->packageOrderUnitQuantity = $quantity;
        return $this;
    }
}
