<?php

declare(strict_types=1);

namespace Naugrim\OpenTrans\Nodes;

use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\OpenTrans\Nodes\Concerns\HasStringValue;
use Naugrim\OpenTrans\Nodes\Concerns\HasTypeAttribute;

class BankAccount implements NodeInterface
{
    use HasTypeAttribute;
    use HasStringValue;

    public const TYPE_IBAN = 'iban';

    public const STANDARD = 'standard';
}
