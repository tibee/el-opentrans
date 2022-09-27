<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;

class AllowOrChargesFix implements NodeInterface
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\AllowOrCharge")
     * @Serializer\SerializedName("ALLOW_OR_CHARGE")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var AllowOrCharge
     */
    protected $allowOrCharge;

    /**
     * @Serializer\Expose
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ALLOW_OR_CHARGES_TOTAL_AMOUNT")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var float
     */
    protected $allowOrChargesTotalAmount;

    public function getAllowOrCharge(): AllowOrCharge
    {
        return $this->allowOrCharge;
    }

    public function setAllowOrCharge(AllowOrCharge $allowOrCharge): self
    {
        $this->allowOrCharge = $allowOrCharge;
        return $this;
    }

    public function getAllowOrChargesTotalAmount(): float
    {
        return $this->allowOrChargesTotalAmount;
    }

    public function setAllowOrChargesTotalAmount(float $allowOrChargesTotalAmount): self
    {
        $this->allowOrChargesTotalAmount = $allowOrChargesTotalAmount;
        return $this;
    }
}
