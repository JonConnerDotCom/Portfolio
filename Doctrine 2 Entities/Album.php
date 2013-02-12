<?php
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 *
 * @author Jon Conner
 *
 * @ORM\Entity(repositoryClass="User\Repository\Album")
 *
 */
class Album
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */

    protected $id;

    /**
     * @ORM\Column(type="string", unique=TRUE)
     */
    protected $name;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="string")
     */
    protected $visibility;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="album")
     */
    protected $images;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="albums")
     */
    protected $owner;

    public function __construct(User $owner, $name, $visibility)
    {

        $this->name = $name;
        $this->visibility = $visibility;
        $this->owner = $owner;

        $this->images = new ArrayCollection();
        $this->created = new \DateTime("now");
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
     * @return the $created
     */

    public function getCreated()
    {

        return $this->created;
    }

    /**
     *
     * @return the $visibility
     */

    public function getVisibility()
    {

        return $this->visibility;
    }

    /**
     *
     * @return the $images
     */

    public function getImages()
    {

        return $this->images;
    }

    /**
     *
     * @return the $owner
     */

    public function getOwner()
    {

        return $this->owner;
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
     *
     * @param field_type $created
     */

    public function setCreated($created)
    {

        $this->created = $created;
    }

    /**
     *
     * @param field_type $visibility
     */

    public function setVisibility($visibility)
    {

        $this->visibility = $visibility;
    }

    /**
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $images
     */

    public function addImage(Image $image)
    {

        $this->images = $image;
    }

    /**
     *
     * @param User $owner
     */

    public function setOwner($owner)
    {

        $this->owner = $owner;
    }

}
