<?php
/**
 * Default Controller
 *
 * @category   Site Bundle
 * @package    Controller
 * @copyright  2011 jorgemeireles.com - Jorge Meireles
 * @license    Simplified BSD
 * @author     Jorge Meireles (info@jorgemeireles.com)
 */

namespace Faianca\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Faianca\SiteBundle\Entity\Blog\Post;
use Faianca\SiteBundle\Form\PostType;

class DefaultController extends Controller
{
    /**
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @return \Symfony\Bundle\FrameworkBundle\Controller\Response
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $blog = $em->getRepository('Faianca\SiteBundle\Entity\Blog\Post')->findAll();
        
        $articles = $em->getRepository('Faianca\SiteBundle\Entity\Blog\Post')->findBy(array(
            'enabled' => 1
        ));
        
        return $this->render('FaiancaSiteBundle:Default:index.html.twig', array(
            'name' => 'yo',
            'articles' => $articles
          ));
    }
}
