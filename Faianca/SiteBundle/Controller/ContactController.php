<?php

/*
 *  @category   Site Bundle
 *  @package    Controller
 *  @copyright  2011 jorgemeireles.com - Jorge Meireles
 *  @license    Simplified BSD
 *  @author     Jorge Meireles (info@jorgemeireles.com)
 */

namespace Faianca\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller {
    
    public function indexAction()
    {
        return $this->render('FaiancaSiteBundle:Contact:index.html.twig');
    }
}
