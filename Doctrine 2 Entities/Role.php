<?php
namespace User\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Permissions\Rbac\AbstractRole;
use Zend\Permissions\Rbac\Rbac;


/**
 * @ORM\Entity
 * @ORM\Table(name="role")
 * @ORM\HasLifeCycleCallbacks
 */
class Role extends AbstractRole
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=11)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    
    protected $id;
    
    /**
     * @ORM\Column(type="string", unique=TRUE)
     */
    protected $name;
    
    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="role")
     */
    protected $users;
    
    /**
     * @ORM\OneToMany(targetEntity="Permission", mappedBy="role")
     *
     * @var Permission $permissions
     */
    protected $permissions;
    
    /**
     *
     * @return the $id
     */
    
    public function getId()
    {
        
        return $this->id;
    }
    
    /**
     *
     * @return the $name
     */
    
    public function getName()
    {
        
        return $this->name;
    }
    
    /**
     *
     * @return the $users
     */
    
    public function getUsers()
    {
        
        return $this->users;
    }
    
    /**
     *
     * @param field_type $id
     */
    
    public function setId($id)
    {
        
        $this->id = $id;
    }
    
    /**
     *
     * @param field_type $name
     */
    
    public function setName($name)
    {
        
        $this->name = $name;
    }
    
    public function __construct()
    {
        
        $this->users = new ArrayCollection();
        $this->permissions = new ArrayCollection();
    }
    
    public function setUsers(User $user)
    {
        
        $this->users[] = $user;
    }
    
    /**
     *
     * @return the $permissions
     */
    
    public function getPermissions()
    {
        
        return $this->permissions;
    }
    
    /**
     *
     * @param \User\Entity\Permission $permissions
     */
    
    public function setPermissions(Permission $permissions)
    {
        
        $this->permissions[] = $permissions;
    }
    
    /**
     * @ORM\PostLoad
     */
    
    public function addToRbac()
    {
        
        $rbac = new Rbac();
        
        foreach ($this->permissions as $permission) {
            if (!$this->hasPermission($permission->getAccess())) {
                $this->addPermission($permission->getAccess());
            }
        }
    }
}
