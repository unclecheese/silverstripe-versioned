<?php

namespace SilverStripe\Versioned\Tests\VersionedTableTest;

use SilverStripe\Dev\TestOnly;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\HasManyList;
use SilverStripe\ORM\ManyManyThroughList;
use SilverStripe\Versioned\Versioned;

/**
 * Class Visitor
 *
 * @property string $Title
 * @method ManyManyThroughList|House[] Houses()
 * @method HasManyList|HouseVisit[] VisitedHouses()
 * @package SilverStripe\Versioned\Tests\VersionedTableTest
 */
class Visitor extends DataObject implements TestOnly
{
    /**
     * @var string
     */
    private static $table_name = 'VersionedTableTest_Visitor';

    /**
     * @var array
     */
    private static $db = [
        'Title' => 'Varchar(50)',
    ];

    /**
     * @var array
     */
    private static $has_many = [
        'VisitedHouses' => HouseVisit::class.'.Visitor',
    ];

    /**
     * @var array
     */
    private static $belongs_many_many = [
        'Houses' => House::class.'.Visitors',
    ];

    /**
     * @var array
     */
    private static $extensions = [
        Versioned::class,
    ];
}
