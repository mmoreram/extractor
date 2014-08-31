<?php

/**
 * This file is part of the Extractor package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

namespace Extractor\tests\Adapter;

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
        $rarExtractorAdapter = new RarExtractorAdapter();
        if (!$rarExtractorAdapter->isAvailable()) {

            $this->markTestSkipped('PHP Rar extension not installed');
        }
    }

    /**
     * Test extract
     */
    public function testExtract()
    {
        $rarExtractorAdapter = new RarExtractorAdapter();
        $finder = $rarExtractorAdapter->extract(dirname(__FILE__). '/Fixtures/file.rar');

        $this->assertEquals($finder->count(), 3);
    }
}
