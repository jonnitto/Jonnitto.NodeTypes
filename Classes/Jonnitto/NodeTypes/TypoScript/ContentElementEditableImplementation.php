<?php
namespace Jonnitto\NodeTypes\TypoScript;


use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Security\Authorization\PrivilegeManagerInterface;
use TYPO3\Neos\Domain\Service\ContentContext;
use Jonnitto\NodeTypes\Service\ContentElementEditableService;
use TYPO3\TYPO3CR\Domain\Model\NodeInterface;
use TYPO3\TypoScript\TypoScriptObjects\AbstractTypoScriptObject;

/**
 * Adds meta data attributes to the processed Property to enable in place editing
 */
class ContentElementEditableImplementation extends AbstractTypoScriptObject
{
    /**
     * @Flow\Inject
     * @var PrivilegeManagerInterface
     */
    protected $privilegeManager;

    /**
     * @Flow\Inject
     * @var ContentElementEditableService
     */
    protected $contentElementEditableService;

    /**
     * The string to be processed
     *
     * @return string
     */
    public function getValue()
    {
        return $this->tsValue('value');
    }

    /**
     * Evaluate this TypoScript object and return the result
     *
     * @return mixed
     */
    public function evaluate()
    {
        $content = $this->getValue();

        /** @var $node NodeInterface */
        $node = $this->tsValue('node');
        if (!$node instanceof NodeInterface) {
            return $content;
        }

        /** @var $property string */
        $property = $this->tsValue('property');

        /** @var $contentContext ContentContext */
        $contentContext = $node->getContext();
        if ($contentContext->getWorkspaceName() === 'live') {
            return $content;
        }

        if (!$this->privilegeManager->isPrivilegeTargetGranted('TYPO3.Neos:Backend.GeneralAccess')) {
            return $content;
        }

        if ($node->isRemoved()) {
            $content = '';
        }
        return $this->contentElementEditableService->wrapContentProperty($node, $property, $content);
    }
}
