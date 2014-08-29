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

namespace Mmoreram\Extractor;

use Mmoreram\Extractor\Adapter\Interfaces\ExtractorAdapterInterface;
use Mmoreram\Extractor\Exception\ExtensionNotSupportedException;
use Mmoreram\Extractor\Resolver\ExtensionResolver;
use Mmoreram\Extractor\Resolver\Interfaces\ExtensionResolverInterface;
use Symfony\Component\Finder\Finder;

/**
 * Class Extractor
 */
class Extractor
{
    /**
     * @var ExtensionResolver
     *
     * Extension resolver
     */
    protected $extensionResolver;

    /**
     * Construct method
     *
     * @param ExtensionResolverInterface $extensionResolver Extension resolver
     */
    public function __construct(ExtensionResolverInterface $extensionResolver)
    {
        $this->extensionResolver = $extensionResolver;
    }

    /**
     * Extract files from compressed file
     *
     * @param string $filename File name
     *
     * @return Finder
     *
     * @throws ExtensionNotSupportedException Exception not found
     */
    public function extractFromFile($filename)
    {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $extractorAdapterNamespace = $this
            ->extensionResolver
            ->getAdapterNamespaceGivenExtension($extension);

        /**
         * @var ExtractorAdapterInterface $extractorAdapter
         */
        $extractorAdapter = new $extractorAdapterNamespace();

        return $extractorAdapter->extract($filename);
    }
}
