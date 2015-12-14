<?php

namespace AA\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AA\PlatformBundle\Entity\CommentsRepository")
 */
class Comments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_parent", type="integer", options={"default" = 0})
     */
    private $idParent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", options={"default" = ""})
     */
    private $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", options={"default" = 0})
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime")
     */
    private $dateModified;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_posts", type="integer")
     */
    private $idPosts;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comments
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Comments
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set idParent
     *
     * @param integer $idParent
     *
     * @return Comments
     */
    public function setIdParent($idParent)
    {
        $this->idParent = $idParent;

        return $this;
    }

    /**
     * Get idParent
     *
     * @return integer
     */
    public function getIdParent()
    {
        return $this->idParent;
    }

    /**
     * Set idPosts
     *
     * @param integer $idPosts
     *
     * @return Comments
     */
    public function setIdPosts($idPosts)
    {
        $this->idPosts = $idPosts;

        return $this;
    }

    /**
     * Get idPosts
     *
     * @return integer
     */
    public function getIdPosts()
    {
        return $this->idPosts;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Comments
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Comments
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dateModified
     *
     * @param \DateTime $dateModified
     *
     * @return Comments
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }
}

