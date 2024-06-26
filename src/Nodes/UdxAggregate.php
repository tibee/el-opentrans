<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;

class UdxAggregate
{
    /**
     * @Serializer\XmlKeyValuePairs
     * @Serializer\Inline
     * @Serializer\Type("array")
     *
     * @var array<string, UdxInterface>
     */
    protected $values = [];

    public function addUdx(UdxInterface $udx): self
    {
        $this->values[$this->createElementName($udx)] = $udx;

        return $this;
    }

    private function createElementName(UdxInterface $udx): string
    {
        return sprintf('UDX.%s.%s', $udx->getVendor(), $udx->getName());
    }
}
