<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

class DeliveryIdRef implements NodeInterface
{
    use HasTypeAttribute;
    use HasStringValue;
}
