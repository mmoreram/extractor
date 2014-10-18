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
use Mmoreram\Extractor\Exception\AdapterNotAvailableException;
use Mmoreram\Extractor\Exception\ExtensionNotSupportedException;
use Mmoreram\Extractor\Exception\FileNotFoundException;
use Mmoreram\Extractor\Filesystem\Interfaces\DirectoryInterface;
use Symfony\Component\Finder\Finder;

/**
 * Class Extractor
 */
class Extractor
{
    /**
     * @var DirectoryInterface
     *
     * Directory
     */
    protected $directory;

    /**
     * Construct method
     *
     * @param DirectoryInterface $directory Directory
     */
    public function __construct(
        DirectoryInterface $directory
    )
    {
        $this->directory = $directory;
    }

    /**
     * Extract files from compressed file
     *
     * @param string $filePath Compressed file path
     *
     * @return Finder Finder instance with all files added
     *
     * @throws ExtensionNotSupportedException Exception not found
     * @throws AdapterNotAvailableException   Adapter not available
     * @throws FileNotFoundException          File not found
     */
    public function extractFromFile($filePath)
    {
        if (!is_file($filePath)) {

            throw new FileNotFoundException($filePath);
        }

        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $this->checkDirectory();

        $extractorAdapterNamespace = $this->getAdapterNamespaceGivenExtension($extension);

        $extractorAdapter = $this
            ->instanceExtractorAdapter($extractorAdapterNamespace);

        if (!$extractorAdapter->isAvailable()) {

            throw new AdapterNotAvailableException($extractorAdapter->getIdentifier());
        }

        return $extractorAdapter->extract($filePath);
    }

    /**
     * Instance new extractor adapter given its namespace
     *
     * @param string $extractorAdapterNamespace Extractor Adapter namespace
     *
     * @return ExtractorAdapterInterface Extractor adapter
     */
    protected function instanceExtractorAdapter($extractorAdapterNamespace)
    {
        return new $extractorAdapterNamespace($this->directory);
    }

    /**
     * Check directory existence and integrity
     *
     * @return $this self Object
     */
    protected function checkDirectory()
    {
        $directoryPath = $this
            ->directory
            ->getDirectoryPath();

        if (!is_dir($directoryPath)) {

            mkdir($directoryPath);
        }

        return $this;
    }

    /**
     * Return a extractor adapter namespace given an extension
     *
     * @param string $fileExtension File extension
     *
     * @return string Adapter namespace
     *
     * @throws ExtensionNotSupportedException Exception not found
     */
    protected function getAdapterNamespaceGivenExtension($fileExtension)
    {
        $adapterNamespace = '\Mmoreram\Extractor\Adapter\\';

        switch ($fileExtension) {

            case 'zip':
                $adapterNamespace .= 'ZipExtractorAdapter';
                break;

            case 'rar':
                $adapterNamespace .= 'RarExtractorAdapter';
                break;

            case 'phar':
                $adapterNamespace .= 'PharExtractorAdapter';
                break;

            case 'tar':
                $adapterNamespace .= 'TarExtractorAdapter';
                break;

            case 'gz':
                $adapterNamespace .= 'TarGzExtractorAdapter';
                break;

            case 'bz2':
                $adapterNamespace .= 'TarBz2ExtractorAdapter';
                break;

            default:
                throw new ExtensionNotSupportedException($fileExtension);
        }

        return $adapterNamespace;
    }
}
