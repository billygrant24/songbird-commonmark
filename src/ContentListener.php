<?php
namespace Songbird\Package\CommonMark;

use League\CommonMark\CommonMarkConverter;
use League\Event\AbstractListener;
use League\Event\EventInterface;

class ContentListener extends AbstractListener
{
    /**
     * Transform the content body attribute from Markdown to HTML.
     *
     * @param \League\Event\EventInterface $event
     */
    public function handle(EventInterface $event)
    {
        $md = new CommonMarkConverter();

        if (isset($event->content['body'])) {
            $event->content['body'] = $md->convertToHtml($event->content['body']);
        }
    }
}