<?php

namespace AA\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AA\PlatformBundle\Entity\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="id_relation", type="integer", nullable=false, length=10)
     *
     */
    private $idRelation;

    /**
     * @var integer
     * @ORM\Column(name="id_user", type="integer", nullable=false, length=10)
     */
    private $idUser;

    /**
     * @var string
     * @ORM\Column(name="comment", type="text", nullable=true, options={"default" = ""})
     */
    private $comment;

    /**
     * @var \DateTime
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var integer
     * @ORM\Column(name="active", type="integer", nullable=true, options={"default" = 0})
     */
    private $active;

    /**
     * @var integer
     * @ORM\Column(name="archive", type="integer", nullable=true, options={"default" = 0})
     */
    private $archive;


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
     * Set idRelation
     *
     * @param integer $idRelation
     *
     * @return comment
     */
    public function setIdRelation($idRelation)
    {
        $this->idRelation = $idRelation;

        return $this;
    }

    /**
     * Get idRelation
     *
     * @return integer
     */
    public function getIdRelation()
    {
        return $this->idRelation;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return comment
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
     * Set comment
     *
     * @param string $comment
     *
     * @return comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return comment
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
     * Set active
     *
     * @param integer $active
     *
     * @return comment
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set archive
     *
     * @param integer $archive
     *
     * @return comment
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * Get archive
     *
     * @return integer
     */
    public function getArchive()
    {
        return $this->archive;
    }
}
