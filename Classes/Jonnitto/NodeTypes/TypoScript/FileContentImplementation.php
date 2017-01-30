<?php
namespace Jonnitto\NodeTypes\TypoScript;

use Neos\Flow\Annotations as Flow;
use Neos\Fusion\TypoScriptObjects\AbstractTypoScriptObject;
use Neos\Flow\Utility;


class FileContentImplementation extends AbstractTypoScriptObject
{

    /**
     * The location of the resource, must be a resource://... URI
     *
     * @return string
     */
    public function getPath()
    {
        return $this->tsValue('path');
    }

    /**
     * If specified, this resource object is used instead of the path and package information
     *
     * @return Resource
     */
    public function getResource()
    {
        return $this->tsValue('resource');
    }

    /**
     * Returns the file content of a resource. Fails silent
     *
     * @return string | boolean
     */
    public function evaluate()
    {
        $resource = $this->getResource();

        if ($resource) {
            return stream_get_contents($resource->getStream());
        }

        $path = $this->getPath();
        if ($path) {
            return Utility\Files::getFileContents($path);
        }

        return false;
    }
}
