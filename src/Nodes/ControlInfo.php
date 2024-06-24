<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class ControlInfo implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("STOP_AUTOMATIC_PROCESSING")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $stopAutomaticProcessing;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("GENERATOR_INFO")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $generatorInfo;

    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("GENERATOR_DATE")
     * @Serializer\XmlElement(cdata=true, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var string
     */
    protected $generatorDate;

    public function getStopAutomaticProcessing(): string
    {
        return $this->stopAutomaticProcessing;
    }

    public function setStopAutomaticProcessing(string $stopAutomaticProcessing): self
    {
        $this->stopAutomaticProcessing = $stopAutomaticProcessing;
        return $this;
    }

    public function getGeneratorInfo(): string
    {
        return $this->generatorInfo;
    }

    public function setGeneratorInfo(string $generatorInfo): self
    {
        $this->generatorInfo = $generatorInfo;
        return $this;
    }

    public function getGeneratorDate(): string
    {
        return $this->generatorDate;
    }

    public function setGeneratorDate(string $generatorDate): self
    {
        $this->generatorDate = $generatorDate;
        return $this;
    }
}
