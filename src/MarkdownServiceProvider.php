<?php
namespace Songbird\Package\CommonMark;

use Songbird\PackageProviderAbstract;

class MarkdownServiceProvider extends PackageProviderAbstract
{
    /**
     * @var array
     */
    protected $provides = [
        'Document.Transformer',
        'League\CommonMark\CommonMarkConverter',
    ];

    /**
     * @param $app
     */
    public function registerPackage($app)
    {
        $app->add('League\CommonMark\CommonMarkConverter');
        $app->add('Document.Transformer', $app->resolve('Songbird\Package\CommonMark\Transformer'));
    }
}
