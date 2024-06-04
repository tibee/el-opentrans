<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\DispatchNotification;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;

/**
 * @Serializer\AccessorOrder("custom", custom = {"controlInfo", "info"})
 */
class DispatchNotificationHeader implements NodeInterface
{
    use HasControlInfo;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\DispatchNotification\DispatchNotificationInfo")
     * @Serializer\SerializedName("DISPATCHNOTIFICATION_INFO")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var DispatchNotificationInfo
     */
    protected $dispatchNotificationInfo;

    public function getDispatchNotificationInfo(): DispatchNotificationInfo
    {
        return $this->dispatchNotificationInfo;
    }

    public function setDispatchNotificationInfo(DispatchNotificationInfo $dispatchNotificationInfo): self
    {
        $this->dispatchNotificationInfo = $dispatchNotificationInfo;
        return $this;
    }
}
