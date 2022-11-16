<?php
/**
 * Box packing (3D bin packing, knapsack problem).
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace DVDoug\BoxPacker\Test;

use DVDoug\BoxPacker\Box;
use DVDoug\BoxPacker\ConstrainedPlacementItem;
use DVDoug\BoxPacker\PackedBox;
use DVDoug\BoxPacker\Rotation;

class THPackTestItem implements ConstrainedPlacementItem
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $length;

    /**
     * @var float
     */
    private $depth;

    /**
     * @var float
     */
    private $weight;

    /**
     * @var bool
     */
    private $widthAllowedVertical;

    /**
     * @var bool
     */
    private $lengthAllowedVertical;

    /**
     * @var bool
     */
    private $depthAllowedVertical;

    /**
     * TestItem constructor.
     */
    public function __construct(
        string $description,
        float $width,
        bool $widthAllowedVertical,
        float $length,
        bool $lengthAllowedVertical,
        float $depth,
        bool $depthAllowedVertical
    ) {
        $this->description = $description;
        $this->width = $width;
        $this->widthAllowedVertical = $widthAllowedVertical;
        $this->length = $length;
        $this->lengthAllowedVertical = $lengthAllowedVertical;
        $this->depth = $depth;
        $this->depthAllowedVertical = $depthAllowedVertical;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function getDepth(): float
    {
        return $this->depth;
    }

    public function getWeight(): float
    {
        return 0;
    }

    public function getAllowedRotation(): Rotation
    {
        return (!$this->widthAllowedVertical && !$this->lengthAllowedVertical && $this->depthAllowedVertical) ? Rotation::KeepFlat : Rotation::BestFit;
    }

    /**
     * Hook for user implementation of item-specific constraints, e.g. max <x> batteries per box.
     */
    public function canBePacked(
        PackedBox $packedBox,
        float $proposedX,
        float $proposedY,
        float $proposedZ,
        float $width,
        float $length,
        float $depth
    ): bool {
        $ok = false;
        if ($depth === $this->width) {
            $ok = $ok || $this->widthAllowedVertical;
        }
        if ($depth === $this->length) {
            $ok = $ok || $this->lengthAllowedVertical;
        }
        if ($depth === $this->depth) {
            $ok = $ok || $this->depthAllowedVertical;
        }

        return $ok;
    }
}
