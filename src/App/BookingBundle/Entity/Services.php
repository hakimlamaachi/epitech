<?php

namespace App\BookingBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Services
 *
 * @ORM\Table(name="services")
 * @ORM\Entity(repositoryClass="App\BookingBundle\Repository\ServicesRepository")
 */
class Services
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    /**
     * @ORM\ManyToMany(targetEntity="App\BookingBundle\Entity\Zone", mappedBy="services",cascade={"persist", "remove"}))
     */

    private $zones;
    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    function __construct()
    {
        $this->zones = new ArrayCollection();

    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Services
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Services
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Services
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getZones()
    {
        return $this->zones;
    }

    /**
     * @param mixed $zones
     */
    public function setZones($zones)
    {
        $this->zones = $zones;
    }
/*    public function removeZone(Zone $zone)
    {
        $this->zones->removeElement($zone);
    }
    public function removeGroup($group)
    {
        //optionally add a check here to see that $group exists before removing it.
        return $this->groups->removeElement($group);
    }*/

    /**
     * Add zone
     *
     * @param \App\BookingBundle\Entity\Zone $zone
     *
     * @return Services
     */
    public function addZone(\App\BookingBundle\Entity\Zone $zone)
    {
        $this->zones[] = $zone;

        return $this;
    }

    /**
     * Remove zone
     *
     * @param \App\BookingBundle\Entity\Zone $zone
     */
    public function removeZone(\App\BookingBundle\Entity\Zone $zone)
    {
        $this->zones->removeElement($zone);
    }
}
