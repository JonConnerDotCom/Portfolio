<?php
namespace User\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 */
class Group
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer", length=13)
     */
    
    protected $id;
    
    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="groups")
     */
    protected $members;
    
    public function __construct()
    {
        
        $this->members = new ArrayCollection;
    }
    
    /**
     * @return ArrayCollection $members
     */
    
    public function getMembers()
    {
        
        return $this->members;
    }
    
    /**
     * @param User $members
     */
    
    public function addMembers(User $members)
    {
        
        $this->members[] = $members;
    }
    
}
