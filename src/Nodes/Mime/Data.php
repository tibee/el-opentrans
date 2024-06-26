<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\Mime;

use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasContentTypeAttribute;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;

class Data implements NodeInterface
{
    use HasContentTypeAttribute;
    use HasStringValue;
}
