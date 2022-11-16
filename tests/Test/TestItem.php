<?php
/**
 * Box packing (3D bin packing, knapsack problem).
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace DVDoug\BoxPacker\Test;

use DVDoug\BoxPacker\Item;
use DVDoug\BoxPacker\Rotation;
use JsonSerializable;
use stdClass;

class TestItem implements Item, JsonSerializable
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
     * @var Rotation
     */
    private $allowedRotation;

    /**
     * Test objects that recurse.
     *
     * @var stdClass
     */
    private $a;

    /**
     * Test objects that recurse.
     *
     * @var stdClass
     */
    private $b;

    /**
     * TestItem constructor.
     */
    public function __construct(
        string $description,
        float $width,
        float $length,
        float $depth,
        float $weight,
        Rotation $allowedRotation
    ) {
        $this->description = $description;
        $this->width = $width;
        $this->length = $length;
        $this->depth = $depth;
        $this->weight = $weight;
        $this->allowedRotation = $allowedRotation;

        $this->a = new stdClass();
        $this->b = new stdClass();

        $this->a->b = $this->b;
        $this->b->a = $this->a;
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
        return $this->weight;
    }

    public function getAllowedRotation(): Rotation
    {
        return $this->allowedRotation;
    }

    public function jsonSerialize(): array
    {
        return [
            'description' => $this->description,
            'width' => $this->width,
            'length' => $this->length,
            'depth' => $this->depth,
            'weight' => $this->weight,
            'allowedRotation' => $this->allowedRotation,
        ];
    }
}
