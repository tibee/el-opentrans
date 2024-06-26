<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\ControlInfo;

trait HasControlInfo
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\ControlInfo")
     * @Serializer\SerializedName("CONTROL_INFO")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var ControlInfo
     */
    protected $controlInfo;

    public function getControlInfo(): ControlInfo
    {
        return $this->controlInfo;
    }

    public function setControlInfo(ControlInfo $controlInfo): NodeInterface
    {
        $this->controlInfo = $controlInfo;
        /** @var NodeInterface $this */
        return $this;
    }
}
