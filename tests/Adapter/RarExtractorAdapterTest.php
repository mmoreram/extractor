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
use Mmoreram\Extractor\Adapter\RarExtractorAdapter;
use PHPUnit_Framework_TestCase;

/**
 * Class RarExtractorAdapterTest
 */
class RarExtractorAdapterTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        if (!class_exists('\RarArchive')) {

            $this->markTestSkipped('PHP Rar extension not installed');
        }
    }

    /**
     * Test extract
     */
    public function testExtract()
    {
        $rarExtractorAdapter = new RarExtractorAdapter();
        $finder = $rarExtractorAdapter->extract(dirname(__FILE__). '/Fixtures/rar.rar');

        $this->assertEquals($finder->count(), 3);
    }
}
 