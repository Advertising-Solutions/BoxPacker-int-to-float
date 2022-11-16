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
 * A packed item.
 */
class PackedItem implements JsonSerializable
{
    protected float $x;

    protected float $y;

    protected float $z;

    protected Item $item;

    protected float $width;

    protected float $length;

    protected float $depth;

    public function __construct(Item $item, float $x, float $y, float $z, float $width, float $length, float $depth)
    {
        $this->item = $item;
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->width = $width;
        $this->length = $length;
        $this->depth = $depth;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function getZ(): float
    {
        return $this->z;
    }

    public function getItem(): Item
    {
        return $this->item;
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

    public function getVolume(): float
    {
        return $this->width * $this->length * $this->depth;
    }

    public static function fromOrientatedItem(OrientatedItem $orientatedItem, float $x, float $y, float $z): self
    {
        return new self(
            $orientatedItem->getItem(),
            $x,
            $y,
            $z,
            $orientatedItem->getWidth(),
            $orientatedItem->getLength(),
            $orientatedItem->getDepth()
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
            'z' => $this->z,
            'width' => $this->width,
            'length' => $this->length,
            'depth' => $this->depth,
            'item' => [
                'description' => $this->item->getDescription(),
                'width' => $this->item->getWidth(),
                'length' => $this->item->getLength(),
                'depth' => $this->item->getDepth(),
                'allowedRotation' => $this->item->getAllowedRotation(),
            ],
        ];
    }
}
