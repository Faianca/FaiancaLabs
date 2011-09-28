<?php

/*
 *  @category   Site Bundle
 *  @package    Manager
 *  @copyright  2011 jorgemeireles.com - Jorge Meireles
 *  @license    Simplified BSD
 *  @author     Jorge Meireles (info@jorgemeireles.com)
 */
namespace Faianca\SiteBundle\Entity\Blog\Manager;

use Faianca\SiteBundle\Interfaces\Blog\CommentInterface;
use Doctrine\ORM\EntityManager;

use Sonata\AdminBundle\Datagrid\ORM\Pager;
use Sonata\AdminBundle\Datagrid\ORM\ProxyQuery;

class CommentManager
{
    protected $em;
    protected $class;

    public function __construct(EntityManager $em, $class)
    {
        $this->em    = $em;
        $this->class = $class;
    }

    public function save(CommentInterface $comment)
    {
        $this->em->persist($comment);
        $this->em->flush();
    }

    public function getClass()
    {
        return $this->class;
    }

    public function findOneBy(array $criteria)
    {
        return $this->em->getRepository($this->class)->findOneBy($criteria);
    }

    public function findBy(array $criteria)
    {
        return $this->em->getRepository($this->class)->findBy($criteria);
    }

    public function delete(CommentInterface $comment)
    {
        $this->em->remove($comment);
        $this->em->flush();
    }

    public function create()
    {
        return new $this->class;
    }

    function getPager(array $criteria, $page)
    {
        $parameters = array();

        $query = $this->em->getRepository($this->class)
            ->createQueryBuilder('c')
            ->orderby('c.createdAt', 'DESC');

        $criteria['status'] = isset($criteria['status']) ? $criteria['status'] : CommentInterface::STATUS_VALID;
        $query->andWhere('c.status = :status');
        $parameters['status'] = $criteria['status'];

        if (isset($criteria['postId'])) {
            $query->andWhere('c.post = :postId');
            $parameters['postId'] = $criteria['postId'];
        }

        $query->setParameters($parameters);

        $pager = new Pager(500); // no limit
        $pager->setQuery(new ProxyQuery($query));
        $pager->setPage($page);
        $pager->init();

        return $pager;
    }
}