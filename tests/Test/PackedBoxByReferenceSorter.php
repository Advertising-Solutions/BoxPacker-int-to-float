<?php
/**
 * Box packing (3D bin packing, knapsack problem).
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace DVDoug\BoxPacker\Test;

use DVDoug\BoxPacker\PackedBox;
use DVDoug\BoxPacker\PackedBoxSorter;

class PackedBoxByReferenceSorter implements PackedBoxSorter
{
    /**
     * @var string
     */
    public static $reference = '';

    public function compare(PackedBox $boxA, PackedBox $boxB): float
    {
        if ($boxA->getBox()->getReference() === static::$reference) {
            return -1;
        } elseif ($boxB->getBox()->getReference() === static::$reference) {
            return 1;
        }

        return 0;
    }
}
