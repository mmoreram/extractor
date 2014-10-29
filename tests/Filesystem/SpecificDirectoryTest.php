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

namespace Mmoreram\Extractor\tests\Filesystem;

use Mmoreram\Extractor\Filesystem\SpecificDirectory;
use PHPUnit_Framework_TestCase;

/**
 * Class SpecificDirectoryTest
 */
class SpecificDirectoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test getDirectoryPath
     */
    public function testGetDirectoryPath()
    {
        $specificDirectory = new SpecificDirectory(dirname(__FILE__) . '/../Filesystem/../Filesystem');
        $this->assertEquals(
            dirname(__FILE__),
            $specificDirectory
        );
    }
}
