<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes\File;

use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasLangAttribute;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

class HashValue implements NodeInterface
{
    use HasTypeAttribute;
    use HasStringValue;
    use HasLangAttribute;
}
