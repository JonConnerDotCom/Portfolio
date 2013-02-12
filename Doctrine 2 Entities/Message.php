<?php
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="User\Repository\Message")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="message_type", type="string")
 * @ORM\DiscriminatorMap({"NOTIFICATION" = "Notification", "MESSAGE" = "Message"})
 */
class Message
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer", length=13)
     */
    
    protected $id;
    
    /**
     * @ORM\Column
     */
    protected $subject;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $body;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="sentMessages")
     */
    protected $sender;
    
    /**
     *  @ORM\ManyToOne(targetEntity="User", inversedBy="receivedMessages")
     */
    protected $recipient;
    
    /**
     * @ORM\Column(length=15)
     */
    protected $status = "Unread";
    
    public function __construct()
    {}
    
    /**
     * @return the $subject
     */
    
    public function getSubject()
    {
        
        return $this->subject;
    }
    
    /**
     * @return the $body
     */
    
    public function getBody()
    {
        
        return $this->body;
    }
    
    /**
     * @return the $created
     */
    
    public function getCreated()
    {
        
        return $this->created;
    }
    
    /**
     * @return the $sender
     */
    
    public function getSender()
    {
        
        return $this->sender;
    }
    
    /**
     * @return the $recipient
     */
    
    public function getRecipient()
    {
        
        return $this->recipient;
    }
    
    /**
     * @return the $status
     */
    
    public function getStatus()
    {
        
        return $this->status;
    }
    
    /**
     * @param field_type $subject
     */
    
    public function setSubject($subject)
    {
        
        $this->subject = $subject;
    }
    
    /**
     * @param field_type $body
     */
    
    public function setBody($body)
    {
        
        $this->body = $body;
    }
    
    /**
     * @param field_type $created
     */
    
    public function setCreated($created)
    {
        
        $this->created = $created;
    }
    
    /**
     * @param field_type $sender
     */
    
    public function setSender(User $sender)
    {
        
        $this->sender = $sender;
    }
    
    /**
     * @param field_type $recipient
     */
    
    public function setRecipient(User $recipient)
    {
        
        $this->recipient = $recipient;
    }
    
    /**
     * @param string $status
     */
    
    public function setStatus($status)
    {
        
        $this->status = $status;
    }
    
}
