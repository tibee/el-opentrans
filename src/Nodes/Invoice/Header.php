<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasControlInfo;
use Naugrim\OpenTrans\Nodes\Order\History;

/**
 * @Serializer\AccessorOrder("custom", custom = {"controlInfo", "info", "orderHistory"})
 */
class Header implements NodeInterface
{
    use HasControlInfo;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Invoice\Info")
     * @Serializer\SerializedName("INVOICE_INFO")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var Info
     */
    protected $info;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\OpenTrans\Nodes\Order\History")
     * @Serializer\SerializedName("ORDER_HISTORY")
     * @Serializer\XmlElement(cdata=false, namespace="http://www.opentrans.org/XMLSchema/2.1")
     *
     * @var History
     */
    protected $orderHistory;

    public function getInfo(): Info
    {
        return $this->info;
    }

    public function setInfo(Info $info): self
    {
        $this->info = $info;
        return $this;
    }

    public function getOrderHistory(): History
    {
        return $this->orderHistory;
    }

    public function setOrderHistory(History $orderHistory): self
    {
        $this->orderHistory = $orderHistory;
        return $this;
    }
}
