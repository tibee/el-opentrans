<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\OrderResponse;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\AllowOrChargesFix;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;

/**
 * @Serializer\AccessorOrder("custom", custom = {"totalItemNum", "totalAmount", "allowOrChargesFix"})
 */
class OrderResponseSummary implements NodeInterface
{
    use HasTotalItemNum;
    use HasTotalAmount;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\AllowOrChargesFix")
     * @Serializer\SerializedName("ALLOW_OR_CHARGES_FIX")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var AllowOrChargesFix
     */
    protected $allowOrChargesFix;

    public function getAllowOrChargesFix(): AllowOrChargesFix
    {
        return $this->allowOrChargesFix;
    }

    public function setAllowOrChargesFix(AllowOrChargesFix $allowOrChargesFix): self
    {
        $this->allowOrChargesFix = $allowOrChargesFix;
        return $this;
    }
}
