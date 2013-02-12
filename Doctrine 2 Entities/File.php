<?php
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="file_type", type="string")
 * @ORM\DiscriminatorMap({"IMAGE" = "Image"})
 */
class File
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer", length=15)
     */
    
    protected $id;
    
    /** @ORM\Column(unique=TRUE) */
    protected $name;
    
    /** @ORM\Column(type="text") */
    protected $url;
    
    /** @ORM\Column */
    protected $md5;
    
    /** @ORM\Column(type="text") */
    protected $data;
    
    /** @ORM\Column(length=3) */
    protected $extension;
}
