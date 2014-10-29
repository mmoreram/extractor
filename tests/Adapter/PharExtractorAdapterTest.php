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

use Mmoreram\Extractor\Adapter\PharExtractorAdapter;
use Mmoreram\Extractor\Filesystem\TemporaryDirectory;
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
        $filesystem = new TemporaryDirectory();
        $pharExtractorAdapter = new PharExtractorAdapter($filesystem);
        if (!$pharExtractorAdapter->isAvailable()) {

            $this->markTestSkipped('PHP Phar extension not installed');
        }
    }

    /**
     * Test extract
     */
    public function testExtract()
    {
        $filesystem = new TemporaryDirectory();
        $pharExtractorAdapter = new PharExtractorAdapter($filesystem);
        $finder = $pharExtractorAdapter->extract(dirname(__FILE__). '/Fixtures/file.phar');

        $this->assertEquals($finder->count(), 3);
    }
}
