<?php
namespace User\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="User\Repository\Comment")
 * @ORM\Table(name="user_post_comment")
 */
class Comment
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    
    protected $id;
    
    /**
     * @ORM\Column(name="score", type="float", precision=2);
     */
    protected $votedScore = 0.00;
    
    /**
     * @ORM\Column(name="created", type="datetime");
     */
    protected $dateCreated;
    
    /**
     * @ORM\Column(type="text", length=350);
     */
    protected $body;
    
    /**
     * Many Comments belong to one Post (OWNING SIDE)
    
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="comments")
     */
    protected $post;
    
    /**
     * Many Comments are authored by one user (OWNING SIDE)
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="authoredComments")
     */
    protected $author;
    
    /**
     * MANY Comments can belong to ONE parent Comment (OWNING SIDE)
     *
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="replys")
     */
    protected $parent;
    
    /**
     * ONE Comment can have MANY replys
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="parent", cascade={"persist"})
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=false)
     */
    protected $replys;
    
    /**
     *  Constructor
     *
     *	@param string $subject
     *	@param string $body
     */
    
    public function __construct($subject = null, $body = null)
    {
        
        $this->replys = new ArrayCollection();
    }
    
    /**
     * @return the $id
     */
    
    public function getId()
    {
        
        return $this->id;
    }
    
    /**
     * @return the $post
     */
    
    public function getPost()
    {
        
        return $this->post;
    }
    
    /**
     * @return the $author
     */
    
    public function getAuthor()
    {
        
        return $this->author;
    }
    
    /**
     * @return the $parent
     */
    
    public function getParent()
    {
        
        return $this->parent;
    }
    
    /**
     * @return the $replys
     */
    
    public function getReplys()
    {
        
        return $this->replys;
    }
    
    /**
     * @return the $votedScore
     */
    
    public function getVotedScore()
    {
        
        return $this->votedScore;
    }
    
    /**
     * @return the $dateCreated
     */
    
    public function getDateCreated()
    {
        
        return $this->dateCreated;
    }
    
    /**
     * @param field_type $id
     */
    
    public function setId($id)
    {
        
        $this->id = $id;
    }
    
    /**
     * @param field_type $post
     */
    
    public function setPost($post)
    {
        
        $this->post = $post;
    }
    
    /**
     * @param field_type $author
     */
    
    public function setAuthor($author)
    {
        
        $this->author = $author;
    }
    
    /**
     * @param field_type $parent
     */
    
    public function setParent($parent)
    {
        
        $this->parent = $parent;
    }
    
    /**
     * @param field_type $replys
     */
    
    public function setReply(Comment $reply)
    {
        
        $this->replys[] = $reply;
    }
    
    /**
     * @param number $votedScore
     */
    
    public function setVotedScore($votedScore)
    {
        
        $this->votedScore += $votedScore;
    }
    
    /**
     * @param field_type $dateCreated
     */
    
    public function setDateCreated($dateCreated)
    {
        
        $this->dateCreated = new \DateTime("now");
    }
    
}
