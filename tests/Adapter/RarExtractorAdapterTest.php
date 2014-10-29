<?php

/*
 * This file is part of the Extractor package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

namespace Mmoreram\Extractor\tests\Adapter;

use Mmoreram\Extractor\Adapter\RarExtractorAdapter;
use Mmoreram\Extractor\Filesystem\TemporaryDirectory;
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
        $filesystem = new TemporaryDirectory();
        $rarExtractorAdapter = new RarExtractorAdapter($filesystem);
        if (!$rarExtractorAdapter->isAvailable()) {

            $this->markTestSkipped('PHP Rar extension not installed');
        }
    }

    /**
     * Test extract
     */
    public function testExtract()
    {
        $filesystem = new TemporaryDirectory();
        $rarExtractorAdapter = new RarExtractorAdapter($filesystem);
        $finder = $rarExtractorAdapter->extract(dirname(__FILE__). '/Fixtures/file.rar');

        $this->assertEquals($finder->count(), 3);
    }
}
