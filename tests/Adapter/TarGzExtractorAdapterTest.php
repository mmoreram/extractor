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

use Mmoreram\Extractor\Adapter\TarGzExtractorAdapter;
use Mmoreram\Extractor\Filesystem\TemporaryDirectory;
use PHPUnit_Framework_TestCase;

/**
 * Class TarGzExtractorAdapterTest
 */
class TarGzExtractorAdapterTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        $filesystem = new TemporaryDirectory();
        $pharExtractorAdapter = new TarGzExtractorAdapter($filesystem);
        if (!$pharExtractorAdapter->isAvailable()) {

            $this->markTestSkipped('Phar extension not installed');
        }
    }

    /**
     * Test extract
     */
    public function testExtract()
    {
        $filesystem = new TemporaryDirectory();
        $tarExtractorAdapter = new TarGzExtractorAdapter($filesystem);
        $finder = $tarExtractorAdapter->extract(dirname(__FILE__). '/Fixtures/file.tar.gz');

        $this->assertEquals($finder->count(), 3);
    }
}
