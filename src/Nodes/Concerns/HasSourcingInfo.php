<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\SourcingInfo;

trait HasSourcingInfo
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\SourcingInfo")
     * @Serializer\SerializedName("SOURCING_INFO")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var SourcingInfo
     */
    protected $sourcingInfo;

    public function getSourcingInfo(): SourcingInfo
    {
        return $this->sourcingInfo;
    }

    public function setSourcingInfo(SourcingInfo $sourcingInfo): NodeInterface
    {
        $this->sourcingInfo = $sourcingInfo;
        /** @var NodeInterface $this */
        return $this;
    }
}
