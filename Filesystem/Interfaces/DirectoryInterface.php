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

namespace Mmoreram\Extractor\Filesystem\Interfaces;

/**
 * Interface DirectoryInterface
 */
interface DirectoryInterface
{
    /**
     * Get directory path
     *
     * @return string Directory path
     */
    public function getDirectoryPath();
}
