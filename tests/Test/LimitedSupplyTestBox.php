<?php
/**
 * Box packing (3D bin packing, knapsack problem).
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace DVDoug\BoxPacker\Test;

use DVDoug\BoxPacker\LimitedSupplyBox;

class LimitedSupplyTestBox extends TestBox implements LimitedSupplyBox
{
    /**
     * @var float
     */
    private $quantity;

    public function __construct(string $reference, float $outerWidth, float $outerLength, float $outerDepth, float $emptyWeight, float $innerWidth, float $innerLength, float $innerDepth, float $maxWeight, float $quantity)
    {
        parent::__construct($reference, $outerWidth, $outerLength, $outerDepth, $emptyWeight, $innerWidth, $innerLength, $innerDepth, $maxWeight);
        $this->quantity = $quantity;
    }

    public function getQuantityAvailable(): float
    {
        return $this->quantity;
    }
}
