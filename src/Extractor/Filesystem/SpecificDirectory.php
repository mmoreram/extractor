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

namespace Mmoreram\Extractor\Filesystem;

use Mmoreram\Extractor\Filesystem\Interfaces\DirectoryInterface;

/**
 * Class SpecificDirectory
 */
class SpecificDirectory implements DirectoryInterface
{
    /**
     * @var string
     *
     * Directory path
     */
    public $directoryPath;

    /**
     * Construct method
     *
     * @param string $directoryPath Directory path
     */
    public function __construct($directoryPath)
    {
        $this->directoryPath = realpath($directoryPath);
    }

    /**
     * Get directory path
     *
     * @return string Directory path
     */
    public function getDirectoryPath()
    {
        return $this->directoryPath;
    }

    /**
     * String representation of the object
     *
     * @return string Directory path
     */
    public function __toString()
    {
        return $this->getDirectoryPath();
    }
}
