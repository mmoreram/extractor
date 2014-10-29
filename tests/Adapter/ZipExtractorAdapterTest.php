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

use Mmoreram\Extractor\Adapter\ZipExtractorAdapter;
use Mmoreram\Extractor\Filesystem\TemporaryDirectory;
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
        $filesystem = new TemporaryDirectory();
        $zipExtractorAdapter = new ZipExtractorAdapter($filesystem);
        if (!$zipExtractorAdapter->isAvailable()) {

            $this->markTestSkipped('PHP Zip extension not installed');
        }
    }

    /**
     * Test extract
     */
    public function testExtract()
    {
        $filesystem = new TemporaryDirectory();
        $zipExtractorAdapter = new ZipExtractorAdapter($filesystem);
        $finder = $zipExtractorAdapter->extract(dirname(__FILE__) . '/Fixtures/file.zip');

        $this->assertEquals($finder->count(), 3);
    }
}
