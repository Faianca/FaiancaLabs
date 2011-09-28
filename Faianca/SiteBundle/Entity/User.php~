<?php
/**
 * User Entity extends FosUser Bundle
 *
 * @category   Site Bundle
 * @package    Entity
 * @copyright  2011 jorgemeireles.com - Jorge Meireles
 * @license    Simplified BSD
 * @author     Jorge Meireles (info@jorgemeireles.com)
 */
namespace Faianca\SiteBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
   
    /**
     * Gets the unique identifier for this entity
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}