<?php
namespace Songbird\Package\CommonMark;

use League\CommonMark\CommonMarkConverter;
use Songbird\Document\DocumentInterface;

class Transformer
{
    /**
     * @var \League\CommonMark\CommonMarkConverter
     */
    protected $markdown;

    /**
     * @param \League\CommonMark\CommonMarkConverter $markdown
     */
    public function __construct(CommonMarkConverter $markdown)
    {
        $this->markdown = $markdown;
    }

    /**
     * @param \Songbird\Document\DocumentInterface $document
     *
     * @return \Songbird\Document\DocumentInterface
     */
    public function apply($document)
    {
        $document['body'] = $this->markdown->convertToHtml($document['body']);

        return $document;
    }
}
