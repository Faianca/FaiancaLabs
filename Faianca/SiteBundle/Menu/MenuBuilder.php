<?php

/*
 *  @category   Site Bundle
 *  @package    Controller
 *  @copyright  2011 jorgemeireles.com - Jorge Meireles
 *  @license    Simplified BSD
 *  @author     Jorge Meireles (info@jorgemeireles.com)
 */

namespace Faianca\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setCurrentUri($request->getRequestUri());

        $menu->addChild('Home', array('route' => 'homepage'));
        $menu->addChild('Blog', array('route' => 'blog_index'));
        $menu->addChild('Tutorials', array('route' => 'homepage'));
        $menu->addChild('Portfolio', array('route' => 'homepage'));
        $menu->addChild('Funny', array('route' => 'homepage'));
        $menu->addChild('Contact', array('route' => 'contact'));
        return $menu;
    }
}