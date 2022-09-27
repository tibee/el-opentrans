<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Concerns;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

trait HasTotalItemNum
{
    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("TOTAL_ITEM_NUM")
     * @Serializer\Type("int")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var int
     */
    protected $totalItemNum;

    public function getTotalItemNum(): int
    {
        return $this->totalItemNum;
    }

    public function setTotalItemNum(int $totalItemNum): NodeInterface
    {
        $this->totalItemNum = $totalItemNum;
        /** @var NodeInterface $this */
        return $this;
    }
}
