<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasContentTypeAttribute
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("contentType")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected $contentType;

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function setContentType(string $contentType): NodeInterface
    {
        $this->contentType = $contentType;
        /** @var NodeInterface $this */
        return $this;
    }
}
