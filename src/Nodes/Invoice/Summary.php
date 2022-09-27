<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Builder\NodeBuilder;
use Naugrim\BMEcat\Exception\InvalidSetterException;
use Naugrim\BMEcat\Exception\UnknownKeyException;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;
use Naugrim\OpenTrans\Nodes\Tax\DetailsFix;

/**
 * @Serializer\AccessorOrder("custom", custom = {"totalItemNum", "netValueGoods", "netValueExtra", "totalAmount", "allowOrChargesFix", "totalTax"})
 */
class Summary implements NodeInterface
{
    use HasTotalItemNum;
    use HasTotalAmount;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("NET_VALUE_GOODS")
     * @Serializer\Type("float")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var float
     */
    protected $netValueGoods;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("TOTAL_TAX")
     * @Serializer\Type("array<Naugrim\OpenTrans\Nodes\Tax\DetailsFix>")
     * @Serializer\XmlList(entry = "TAX_DETAILS_FIX")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var DetailsFix[]
     */
    protected $totalTax = [];

    public function getNetValueGoods(): float
    {
        return $this->netValueGoods;
    }

    public function setNetValueGoods(float $netValueGoods): self
    {
        $this->netValueGoods = $netValueGoods;
        return $this;
    }

    /**
     * @return DetailsFix[]
     */
    public function getTotalTax(): array
    {
        return $this->totalTax;
    }

    /**
     * @param DetailsFix[] $taxes
     * @throws InvalidSetterException
     * @throws UnknownKeyException
     */
    public function setTotalTax(array $taxes): self
    {
        foreach ($taxes as $tax) {
            if (! $tax instanceof DetailsFix) {
                /** @var DetailsFix $tax */
                $tax = NodeBuilder::fromArray((array) $tax, new DetailsFix());
            }
            $this->addTotalTax($tax);
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function addTotalTax(DetailsFix $tax): self
    {
        $this->totalTax[] = $tax;
        return $this;
    }
}
