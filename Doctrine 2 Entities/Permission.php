<?php
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Zend\Json\Json;


/**
 * @ORM\Entity(repositoryClass="User\Repository\Permission")
 */
class Permission
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    
    protected $id;
    
    /**
     *
     * @ORM\Column(type="string", name="access")
     */
    protected $access;
    
    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="permissions")
     **/
    protected $role;
    
    /**
     *  Permission Constructor
     *
     *	@param mixed $rights
     */
    
    public function __construct($right)
    {
        
        $this->roles = new ArrayCollection();
        $this->access = $right;
    }
    
    public function setName($name)
    {
        
        $this->name = $name;
    }
    
    public function getName($name)
    {
        
        return $this->name;
    }
    /**
     * @return the $id
     */
    
    public function getId()
    {
        
        return $this->id;
    }
    
    /**
     * @return the $access
     */
    
    public function getAccess()
    {
        
        return Json::decode($this->access, Json::TYPE_ARRAY);
    }
    
    public function getRawAccess()
    {
        
        return $this->access;
    }
    
    /**
     * @return the $role
     */
    
    public function getRole()
    {
        
        return $this->role;
    }
    
    /**
     * @param field_type $id
     */
    
    public function setId($id)
    {
        
        $this->id = $id;
    }
    
    /**
     * @param field_type $access
     */
    
    public function setAccess($access)
    {
        
        $this->access = $access;
    }
    
    /**
     * @param field_type $role
     */
    
    public function setRole($role)
    {
        
        $this->role = $role;
    }
    
}
