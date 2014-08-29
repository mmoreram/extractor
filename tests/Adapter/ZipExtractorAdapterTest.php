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

namespace Extractor\Tests\Adapter;

use Mmoreram\Extractor\Adapter\ZipExtractorAdapter;
use PHPUnit_Framework_TestCase;

/**
 * Class ZipExtractorAdapterTest
 */
class ZipExtractorAdapterTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        if (!class_exists('\ZipArchive')) {

            $this->markTestSkipped('PHP Zip extension not installed');
        }
    }

    /**
     * Test extract
     */
    public function testExtract()
    {
        $zipExtractorAdapter = new ZipExtractorAdapter();
        $finder = $zipExtractorAdapter->extract(dirname(__FILE__) . '/Fixtures/zip.zip');

        $this->assertEquals($finder->count(), 3);
    }
}
 