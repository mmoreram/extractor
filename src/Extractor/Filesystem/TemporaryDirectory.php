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
 * Class TemporaryDirectory
 */
class TemporaryDirectory implements DirectoryInterface
{
    /**
     * @var string
     *
     * Directory path
     */
    public $directoryPath;

    /**
     * Construct method
     */
    public function __construct()
    {
        $this->directoryPath = sys_get_temp_dir() . "/" . uniqid(time());
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
