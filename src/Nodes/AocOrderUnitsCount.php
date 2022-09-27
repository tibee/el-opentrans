<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

class AocOrderUnitsCount implements NodeInterface
{
    use HasTypeAttribute;
}
