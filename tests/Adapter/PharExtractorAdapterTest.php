<?php

/**
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Extractor\tests\Adapter;

use Mmoreram\Extractor\Adapter\PharExtractorAdapter;
use PHPUnit_Framework_TestCase;

/**
 * Class PharExtractorAdapterTest
 */
class PharExtractorAdapterTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        if (!class_exists('\Phar')) {

            $this->markTestSkipped('PHP Phar extension not installed');
        }
    }

    /**
     * Test extract
     */
    public function testExtract()
    {
        $pharExtractorAdapter = new PharExtractorAdapter();
        $finder = $pharExtractorAdapter->extract(dirname(__FILE__). '/Fixtures/phar.phar');

        $this->assertEquals($finder->count(), 3);
    }
}
