<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasTypeAttribute
{
    use CanAssertConstantValue;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\XmlAttribute
     *
     * @var string
     */
    protected $type;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): NodeInterface
    {
        self::assertValidConstant($type);

        $this->type = $type;
        /** @var NodeInterface $this */
        return $this;
    }
}
