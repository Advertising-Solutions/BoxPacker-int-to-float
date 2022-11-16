<?php
/**
 * Box packing (3D bin packing, knapsack problem).
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace DVDoug\BoxPacker\Test;

use DVDoug\BoxPacker\Box;
use JsonSerializable;

class TestBox implements Box, JsonSerializable
{
    /**
     * @var string
     */
    private $reference;

    /**
     * @var float
     */
    private $outerWidth;

    /**
     * @var float
     */
    private $outerLength;

    /**
     * @var float
     */
    private $outerDepth;

    /**
     * @var float
     */
    private $emptyWeight;

    /**
     * @var float
     */
    private $innerWidth;

    /**
     * @var float
     */
    private $innerLength;

    /**
     * @var float
     */
    private $innerDepth;

    /**
     * @var float
     */
    private $maxWeight;

    /**
     * TestBox constructor.
     */
    public function __construct(
        string $reference,
        float $outerWidth,
        float $outerLength,
        float $outerDepth,
        float $emptyWeight,
        float $innerWidth,
        float $innerLength,
        float $innerDepth,
        float $maxWeight
    ) {
        $this->reference = $reference;
        $this->outerWidth = $outerWidth;
        $this->outerLength = $outerLength;
        $this->outerDepth = $outerDepth;
        $this->emptyWeight = $emptyWeight;
        $this->innerWidth = $innerWidth;
        $this->innerLength = $innerLength;
        $this->innerDepth = $innerDepth;
        $this->maxWeight = $maxWeight;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getOuterWidth(): float
    {
        return $this->outerWidth;
    }

    public function getOuterLength(): float
    {
        return $this->outerLength;
    }

    public function getOuterDepth(): float
    {
        return $this->outerDepth;
    }

    public function getEmptyWeight(): float
    {
        return $this->emptyWeight;
    }

    public function getInnerWidth(): float
    {
        return $this->innerWidth;
    }

    public function getInnerLength(): float
    {
        return $this->innerLength;
    }

    public function getInnerDepth(): float
    {
        return $this->innerDepth;
    }

    public function getMaxWeight(): float
    {
        return $this->maxWeight;
    }

    public function jsonSerialize(): array
    {
        return [
            'reference' => $this->reference,
            'innerWidth' => $this->innerWidth,
            'innerLength' => $this->innerLength,
            'innerDepth' => $this->innerDepth,
            'emptyWeight' => $this->emptyWeight,
            'maxWeight' => $this->maxWeight,
        ];
    }
}
