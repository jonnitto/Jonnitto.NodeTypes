<?php
namespace Jonnitto\NodeTypes\Controller;

use Neos\Flow\Annotations as Flow;
use Neos\Error\Messages\Message;

use Neos\Flow\ResourceManagement\PersistentResource as FlowResource;
use Neos\Flow\ResourceManagement\ResourceRepository;
use Neos\Flow\ResourceManagement\ResourceManager;

/**
 * @Flow\Scope("singleton")
 */
class DownloadController extends \Neos\Neos\Controller\Module\AbstractModuleController {

    /**
     * @Flow\Inject
     * @var ResourceRepository
     */
    protected $resourceRepository;

    /**
     * @Flow\Inject
     * @var ResourceManager
     */
    protected $resourceManager;

    /**
     * @param string $resource
     * @return void
     */
    public function downloadAction($resource='') {
        if ( empty($resource) ) {
            header("HTTP/1.0 404 Not Found");
            exit('No resource identifier given');
        }
        /** @var FlowResource $flowResource */
        $flowResource = $this->resourceRepository->findByIdentifier($resource);
        if ( !is_object($flowResource) ) {
            header("HTTP/1.0 404 Not Found");
            exit('Resource not found.');
        }

        $fileExtension = $flowResource->getFileExtension();
        $filename = $flowResource->getFilename();
        $fileExtensionFromFilename = substr($filename, strlen($fileExtension) * -1);

        // Make shure file has an proper file extension
        if ( $fileExtensionFromFilename != $fileExtension ) {
            $filename .= '.' . $fileExtension;
        }

        header('Content-Length: ' . $flowResource->getFileSize());
        header('Content-disposition: attachment; filename="' . $filename . '"');

        if ( $fileExtension === 'pdf' ) {
            header('Content-Type: application/pdf');
        } else {
            header('Content-Type: application/octet-stream');
            header('Content-Transfer-Encoding: Binary');
        }

        fpassthru($flowResource->getStream());
    }

}
