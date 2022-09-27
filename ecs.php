<?php

use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    // A. full sets
    $ecsConfig->sets([SetList::PSR_12]);
    $ecsConfig->sets([SetList::CLEAN_CODE]);
    //$ecsConfig->sets([SetList::COMMON]);
};
