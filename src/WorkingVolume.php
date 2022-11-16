<?php
/**
 * Box packing (3D bin packing, knapsack problem).
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace DVDoug\BoxPacker;

use JsonSerializable;

/**
 * Class WorkingVolume.
 * @internal
 */
class WorkingVolume implements Box, JsonSerializable
{
    private float $width;

    private float $length;

    private float $depth;

    private float $maxWeight;

    public function __construct(
        float $width,
        float $length,
        float $depth,
        float $maxWeight
    ) {
        $this->width = $width;
        $this->length = $length;
        $this->depth = $depth;
        $this->maxWeight = $maxWeight;
    }

    public function getReference(): string
    {
        return "Working Volume {$this->width}x{$this->length}x{$this->depth}";
    }

    public function getOuterWidth(): float
    {
        return $this->width;
    }

    public function getOuterLength(): float
    {
        return $this->length;
    }

    public function getOuterDepth(): float
    {
        return $this->depth;
    }

    public function getEmptyWeight(): float
    {
        return 0;
    }

    public function getInnerWidth(): float
    {
        return $this->width;
    }

    public function getInnerLength(): float
    {
        return $this->length;
    }

    public function getInnerDepth(): float
    {
        return $this->depth;
    }

    public function getMaxWeight(): float
    {
        return $this->maxWeight;
    }

    public function jsonSerialize(): array
    {
        return [
            'reference' => $this->getReference(),
            'width' => $this->width,
            'length' => $this->length,
            'depth' => $this->depth,
            'maxWeight' => $this->maxWeight,
        ];
    }
}
