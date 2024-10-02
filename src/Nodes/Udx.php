<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\OpenTrans\Nodes\Concerns\HasDigitecUdx;

class Udx implements UdxInterface
{

    use HasDigitecUdx;
    
    /**
     * @Serializer\Exclude
     *
     * @var string
     */
    protected $vendor;

    /**
     * @Serializer\Exclude
     *
     * @var string
     */
    protected $name;

    /**
     * @Serializer\Type("string")
     * @Serializer\Inline
     *
     * @var string
     */
    protected $value;

    public function __toString(): string
    {
        return $this->getValue();
    }

    public function getVendor(): string
    {
        return $this->vendor;
    }

    public function setVendor(string $vendor): self
    {
        $this->vendor = $vendor;
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

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }
}

