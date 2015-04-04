<?php
namespace Songbird\Package\CommonMark;

use League\Event\Emitter;
use Songbird\PackageProviderAbstract;

class CommonMarkProvider extends PackageProviderAbstract
{
    /**
     * Inform ContentEvent of our ModifyContentListener in order to transform the content body attribute
     * from Markdown to HTML.
     *
     * @param \League\Event\Emitter $event
     */
    protected function registerEventListeners(Emitter $event)
    {
        $event->addListener('ContentEvent', new ContentListener());
    }
}