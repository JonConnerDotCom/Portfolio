<?php
namespace User\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */
class Tag
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    
    protected $id;
    
    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="tags")
     */
    protected $posts;
    
    /**
     * Constructor
     */
    
    public function __construct()
    {
        
        $this->posts = new ArrayCollection();
    }
    
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
     * @return the $posts
     */
    
    public function getPosts()
    {
        
        return $this->posts;
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
    
    /**
     * @param Post $posts
     */
    
    public function addPost(Post $post)
    {
        
        $this->posts[] = $post;
    }
}
