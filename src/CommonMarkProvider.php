<?php
namespace Songbird\Package\CommonMark;

use League\CommonMark\CommonMarkConverter;
use League\Container\ContainerInterface;
use Songbird\Event\Event;
use Songbird\PackageProviderAbstract;

class CommonMarkProvider extends PackageProviderAbstract
{
    /**
     * @var array
     */
    protected $provides = [
        'CommmonMark',
    ];

    /**
     * @param \League\Container\ContainerInterface $app
     */
    public function registerPackage(ContainerInterface $app)
    {
        $app->add('CommonMark', new CommonMarkConverter());
    }

    /**
     * @param \League\Container\ContainerInterface $app
     * @param \Songbird\Event\Event                $event
     */
    protected function registerEventListeners(ContainerInterface $app, Event $event)
    {
        $event->addListener('PrepareDocument', function ($event, $args) use ($app) {
            $md = $app->get('CommonMark');

            $args['document']['body'] = $md->convertToHtml($args['document']['body']);
        });
    }
}
