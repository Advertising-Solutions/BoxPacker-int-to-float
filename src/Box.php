<?php
/**
 * Box packing (3D bin packing, knapsack problem).
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace DVDoug\BoxPacker;

/**
 * A "box" (or envelope?) to pack items into.
 */
interface Box
{
    /**
     * Reference for box type (e.g. SKU or description).
     */
    public function getReference(): string;

    /**
     * Outer width in mm.
     */
    public function getOuterWidth(): float;

    /**
     * Outer length in mm.
     */
    public function getOuterLength(): float;

    /**
     * Outer depth in mm.
     */
    public function getOuterDepth(): float;

    /**
     * Empty weight in g.
     */
    public function getEmptyWeight(): float;

    /**
     * Inner width in mm.
     */
    public function getInnerWidth(): float;

    /**
     * Inner length in mm.
     */
    public function getInnerLength(): float;

    /**
     * Inner depth in mm.
     */
    public function getInnerDepth(): float;

    /**
     * Max weight the packaging can hold in g.
     */
    public function getMaxWeight(): float;
}
