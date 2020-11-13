<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Mass extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Kilogram
        $kilogram = UnitOfMeasure::nativeUnitFactory('kg');
        $kilogram->addAlias('kilogram');
        $kilogram->addAlias('kilograms');
        $kilogram->addAlias('KGM');
        static::addUnit($kilogram);

        static::addMissingSIPrefixedUnits(
            $kilogram,
            1e-3,
            '%pg',
            [
                '%Pgram',
                '%Pgrams',
            ]
        );

        // add GS1 units for gram
        static::getUnit('g')->addAlias('GRM');

        // Tonne (metric)
        $newUnit = UnitOfMeasure::linearUnitFactory('t', 1e3);
        $newUnit->addAlias('ton');
        $newUnit->addAlias('tons');
        $newUnit->addAlias('tonne');
        $newUnit->addAlias('tonnes');
        $newUnit->addAlias('TNE');
        static::addUnit($newUnit);

        // Pound
        $newUnit = UnitOfMeasure::linearUnitFactory('lb', 4.5359237e-1);
        $newUnit->addAlias('lbs');
        $newUnit->addAlias('pound');
        $newUnit->addAlias('pounds');
        $newUnit->addAlias('LBR');
        static::addUnit($newUnit);

        // Ounce
        $newUnit = UnitOfMeasure::linearUnitFactory('oz', 4.5359237e-1 / 16);
        $newUnit->addAlias('ounce');
        $newUnit->addAlias('ounces');
        static::addUnit($newUnit);

        // Stone
        $newUnit = UnitOfMeasure::linearUnitFactory('st', 4.5359237e-1 * 14);
        $newUnit->addAlias('stone');
        $newUnit->addAlias('stones');
        static::addUnit($newUnit);
    }
}
