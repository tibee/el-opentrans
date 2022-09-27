<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Catalog;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class Reference implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CATALOG_ID")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $id;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CATALOG_VERSION")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $version;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CATALOG_NAME")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.bmecat.org/bmecat/2005")
     *
     * @var string
     */
    protected $name;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
