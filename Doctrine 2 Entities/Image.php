<?php
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 *
 * @author Jon Conner
 * @ORM\Entity(repositoryClass="User\Repository\Image")
 */
class Image extends File
{
    
    /**
     * @ORM\Column(unique=TRUE)
     */
    
    protected $title;
    
    /**
     * @ORM\Column
     */
    protected $visibility = null;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;
    
    /**
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="images")
     */
    protected $album;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="images")
     */
    protected $owner;
    
    public function __construct(User $owner, $title, $visibility = null, $ext, $fileName, $data, $md5, $url)
    {
        
        $this->title = $title;
        $this->visibility = $visibility;
        $this->owner = $owner;
        $this->extension = $ext;
        $this->name = $fileName;
        $this->md5 = $md5;
        $this->url = $url;
        $this->data = $data;
        
        $this->created = new \DateTime("now");
    }
    
    /**
     * @return the $title
     */
    
    public function getTitle()
    {
        
        return $this->title;
    }
    
    /**
     * @return the $visibility
     */
    
    public function getVisibility()
    {
        
        return $this->visibility;
    }
    
    /**
     * @return the $created
     */
    
    public function getCreated()
    {
        
        return $this->created;
    }
    
    /**
     * @return the $album
     */
    
    public function getAlbum()
    {
        
        return $this->album;
    }
    
    /**
     * @return the $owner
     */
    
    public function getOwner()
    {
        
        return $this->owner;
    }
    
    /**
     * @param field_type $title
     */
    
    public function setTitle($title)
    {
        
        $this->title = $title;
    }
    
    /**
     * @param string $visibility
     */
    
    public function setVisibility($visibility)
    {
        
        $this->visibility = $visibility;
    }
    
    /**
     * @param field_type $album
     */
    
    public function setAlbum($album)
    {
        
        $this->album = $album;
    }
    
    /**
     * @param User $owner
     */
    
    public function setOwner($owner)
    {
        
        $this->owner = $owner;
    }
    
}
