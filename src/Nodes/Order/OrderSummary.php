<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Order;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalAmount;
use Naugrim\OpenTrans\Nodes\Concerns\HasTotalItemNum;

/**
 * @Serializer\AccessorOrder("custom", custom = {"totalItemNum", "totalAmount"})
 */
class OrderSummary implements NodeInterface
{
    use HasTotalItemNum;
    use HasTotalAmount;
}
