<?php
namespace User\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="User\Repository\Post")
 * @ORM\Table(name="user_post")
 */
class Post
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    
    protected $id;
    
    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $body;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $subject;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="authoredPosts")
     */
    protected $author;
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="post")
     */
    protected $comments;
    
    /**
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="posts")
     */
    protected $tags;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;
    
    /**
     *
     * @return the $tags
     */
    
    public function getTags()
    {
        
        return $this->tags;
    }
    
    /**
     *
     * @param field_type $tags
     */
    
    public function addTags(Tag $tag)
    {
        
        $tag->addPost($this);
        $this->tags[] = $tag;
        
    }
    
    /**
     * Constructor
     */
    
    public function __construct()
    {
        
        $this->comments = new ArrayCollection();
        $this->created = new \DateTime("now");
        $this->tags = new ArrayCollection();
    }
    
    /**
     *
     * @return int $id
     */
    
    public function getId()
    {
        
        return $this->id;
    }
    
    /**
     *
     * @return text string
     */
    
    public function getBody()
    {
        
        return $this->body;
    }
    
    /**
     *
     * @return string $subject
     */
    
    public function getSubject()
    {
        
        return $this->subject;
    }
    
    /**
     *
     * @return User $author
     */
    
    public function getAuthor()
    {
        
        return $this->author;
    }
    
    /**
     *
     * @return ArrayCollection $comments
     */
    
    public function getComments()
    {
        
        return $this->comments;
    }
    
    /**
     *
     * @return string $description
     */
    
    public function getDescription()
    {
        
        return $this->description;
    }
    
    /**
     *
     * @param int $id
     */
    
    public function setId($id)
    {
        
        $this->id = $id;
    }
    
    /**
     *
     * @param text|string $body
     */
    
    public function setBody($body)
    {
        
        $this->body = $body;
    }
    
    /**
     *
     * @param string $subject
     */
    
    public function setSubject($subject)
    {
        
        $this->subject = $subject;
    }
    
    /**
     *
     * @param User $author
     */
    
    public function setAuthor(User $author)
    {
        
        $this->author = $author;
    }
    
    /**
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $comments
     */
    
    public function setComments(Comment $comment)
    {
        
        $this->comments[] = $comment;
    }
    
    /**
     *
     * @param string $description
     */
    
    public function setDescription($description)
    {
        
        $this->description = $description;
    }
}
