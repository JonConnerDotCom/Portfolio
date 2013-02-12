<?php
namespace User\Entity;

use Zend\Crypt\Password\Bcrypt;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="User\Repository\User")
 */
class User
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer", length=13)
     */

    protected $id;

    /**
     * @ORM\Column(type="string", unique=TRUE, length=100)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", unique=TRUE, length=32)
     */
    protected $username;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="date")
     */
    protected $dob;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $recovery;

    /**
     * @ORM\Column(type="string", name="account_status")
     */
    protected $accountStatus;

    /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="user")
     */
    protected $role;

    /**
     * ONE User can author MANY Comments
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="author")
     */
    protected $authoredComments;

    /**
     * ONE User can author MANY Posts
     *
     * @ORM\OneToMany(targetEntity="Post", mappedBy="author")
     */
    protected $authoredPosts;

    /**
     * ONE User can send Many Messages
     *
     * @ORM\OneToMany(targetEntity="Message", mappedBy="sender")
     */
    protected $sentMessages;

    /**
     * ONE User can receive MANY Messages
     *
     * @ORM\OneToMany(targetEntity="Message", mappedBy="recipient")
     * @ORM\OrderBy({"created" = "DESC"})
     */
    protected $receivedMessages;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="followers")
     **/
    protected $followingMe;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="followingMe")
     * @ORM\JoinTable(name="user_followers",
     *      joinColumns={
     *          @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *      },
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="follower_user_id", referencedColumnName="id")
     *      }
     * )
     **/
    protected $followers;

    /**
     *	@ORM\OneToMany(targetEntity="Album", mappedBy="owner")
     */
    protected $albums;

    /**
     * @ORM\ManyToMany(targetEntity="Group", mappedBy="members")
     */
    protected $groups;

    /**
     * Constructor
     */
	public function __construct()
    {

        $this->setCreated();

        $this->role = new ArrayCollection();
        $this->authoredComments = new ArrayCollection();
        $this->authoredPosts = new ArrayCollection();
        $this->followers = new ArrayCollection();
        $this->followingMe = new ArrayCollection();
        $this->albums = new ArrayCollection();
        $this->groups = new ArrayCollection();
        $this->receivedMessages = new ArrayCollection();
        $this->sentMessages = new ArrayCollection();

        $this->setAccountStatus("active");

    }
    /**
     * @return the $dob
     */
    public function getDob ()
    {
        return $this->dob;
    }

	/**
     * @param field_type $dob
     */
    public function setDob ($dob)
    {
        $this->dob = $dob;
    }

	/**
     * @param \Doctrine\Common\Collections\ArrayCollection $followers
     */
    public function setFollowers ($followers)
    {
        $this->followers = $followers;
    }

	/**
     * @param \Doctrine\Common\Collections\ArrayCollection $groups
     */
    public function setGroups ($groups)
    {
        $this->groups = $groups;
    }



    /**
     * @return the $groups
     */

    public function getGroups()
    {

        return $this->groups;
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
     * @return the $email
     */

    public function getEmail()
    {

        return $this->email;
    }

    /**
     *
     * @return the $username
     */

    public function getUsername()
    {

        return $this->username;
    }

    /**
     *
     * @return the $password
     */

    public function getPassword()
    {

        return $this->password;
    }

    /**
     *
     * @return the $firstName
     */

    public function getFirstName()
    {

        return $this->firstName;
    }

    public function getFullName()
    {

        return $this->firstName . "&nbsp;" . $this->lastName;
    }

    /**
     *
     * @return the $firstName
     */

    public function getMessages()
    {

        return false;
    }

    /**
     *
     * @return the $lastName
     */

    public function getLastName()
    {

        return $this->lastName;
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
     * @return the $recovery
     */

    public function getRecovery()
    {

        return $this->recovery;
    }

    /**
     *
     * @return the $accountStatus
     */

    public function getAccountStatus()
    {

        return $this->accountStatus;
    }

    /**
     *
     * @return \DateTime
     */

    public function getUpdated()
    {

        return $this->updated;
    }

    /**
     *
     * @return $roles
     */

    public function getRole()
    {

        return $this->role;
    }

    /**
     *
     * @return the $authoredComments
     */

    public function getAuthoredComments()
    {

        return $this->authoredComments;
    }

    /**
     *
     * @return the $authoredPosts
     */

    public function getAuthoredPosts()
    {

        return $this->authoredPosts;
    }
    /**
     * @return the $friendsWithMe
     */

    public function getFriendsWithMe()
    {

        return $this->friendsWithMe;
    }

    /**
     * @return the $myFriends
     */

    public function getMyFriends()
    {

        return $this->myFriends;
    }

    /**
     *
     * @param string $email
     */

    public function setEmail($email)
    {

        $this->email = $email;
    }

    /**
     * @return the $sentMessages
     */

    public function getSentMessages()
    {

        return $this->sentMessages;
    }

    /**
     * @return the $receivedMessages
     */

    public function getReceivedMessages()
    {

        return $this->receivedMessages;
    }

    /**
     * @return the $followingMe
     */

    public function getFollowingMe()
    {

        return $this->followingMe;
    }

    /**
     * @return the $myFollowers
     */

    public function getFollowers()
    {

        return $this->followers;
    }

    /**
     * @return the $albums
     */

    public function getAlbums()
    {

        return $this->albums;
    }
    /**
     *
     * @param string $username
     */

    public function setUsername($username)
    {

        $this->username = $username;
    }

    /**
     * @param Post $post
     */

    public function setAuthoredPosts(Post $post)
    {

        $post->setAuthor($this);

        $this->authoredPosts[] = $post;

    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $friendsWithMe
     */

    public function setFriendsWithMe(User $friendsWithMe)
    {

        $this->friendsWithMe = $friendsWithMe;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $myFriends
     */

    public function setMyFriends(User $myFriends)
    {

        $this->myFriends = $myFriends;
    }

    /**
     * @param integer $id
     */

    public function setId($id)
    {

        $this->id = $id;
    }

    /**
     *
     * @param \DateTime $created
     */

    public function setCreated()
    {

        $this->created = new \DateTime("now");
    }

    /**
     *
     * @param \DateTime $updated
     */

    public function setUpdated()
    {

        $this->updated = new \DateTime("now");
    }

    /**
     *
     * @param Role $role
     */

    public function setRole(Role $role)
    {

        $role->setUsers($this);
        $this->role[] = $role;
    }

    /**
     * Use the BCrypt alorithm to store
     * secure passwords.
     *
     * @param string $password
     */

    public function setPassword($password)
    {

        $bcrypt = new Bcrypt();
        $this->password = $bcrypt->create($password);
    }

    /**
     *
     * @param field_type $firstName
     */

    public function setFirstName($firstName)
    {

        $this->firstName = $firstName;
    }

    /**
     *
     * @param field_type $lastName
     */

    public function setLastName($lastName)
    {

        $this->lastName = $lastName;
    }

    /**
     *
     * @param field_type $recovery
     */

    public function setRecovery($recovery)
    {

        $this->recovery = $recovery;
    }

    /**
     *
     * @param field_type $accountStatus
     */

    public function setAccountStatus($accountStatus)
    {

        $this->accountStatus = $accountStatus;
    }

    /**
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $authoredComments
     */

    public function setAuthoredComment(Comment $authoredComment)
    {

        $authoredComment->setAuthor($this);
        $this->authoredComments[] = $authoredComment;
    }

    /**
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $authoredPosts
     */

    public function setAuthoredPost(Post $authoredPost)
    {

        $authoredPost->setAuthor($this);
        $this->authoredPosts[] = $authoredPost;
    }

    /**
     * @param Ambigous <Comment, \Doctrine\Common\Collections\ArrayCollection> $authoredComments
     */

    public function setAuthoredComments($authoredComments)
    {

        $this->authoredComments = $authoredComments;
    }

    /**
     * @param field_type $sentMessages
     */

    public function setSentMessages($sentMessages)
    {

        $this->sentMessages = $sentMessages;
    }

    /**
     * @param field_type $receivedMessages
     */

    public function setReceivedMessages($receivedMessages)
    {

        $this->receivedMessages = $receivedMessages;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $followingMe
     */

    public function setFollowingMe($followingMe)
    {

        $this->followingMe = $followingMe;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $myFollowers
     */

    public function setMyFollowers($myFollowers)
    {

        $this->myFollowers = $myFollowers;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $albums
     */

    public function setAlbums($albums)
    {

        $this->albums = $albums;
    }

}
