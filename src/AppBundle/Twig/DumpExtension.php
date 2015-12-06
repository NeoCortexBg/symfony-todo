<?php
namespace AppBundle\Twig;

class DumpExtension extends \Twig_Extension
{

	protected $container;

    public function __construct($container)
	{
		$this->container = $container;
	}

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('dump', array($this, 'dump')),
        );
    }

    public function dump($v)
    {
        return ppv($v, true);
    }

    public function getName()
    {
        return 'dump_extension';
    }
}
