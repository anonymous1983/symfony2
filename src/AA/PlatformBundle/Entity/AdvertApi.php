<?php

namespace AA\PlatformBundle\Entity;

use FOS\UserBundle\Entity\Advert as BaseAdvert;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * AdvertRest
 *
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AA\PlatformBundle\Entity\AdvertRepository")
 *
 * @ExclusionPolicy("all") 
 */
class AdvertRest extends BaseAdvert
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     * @Expose
     */
    protected $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Expose
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     * @Expose
     */
    protected $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @Expose
     */
    protected $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true, options={"default" = 0})
     * @Expose
     */
    protected $status;


}

