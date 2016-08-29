<?php

namespace App\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\EventDispatcher\Tests\Service;

/**
 * Zone
 *
 * @ORM\Table(name="zone")
 * @ORM\Entity(repositoryClass="App\BookingBundle\Repository\ZoneRepository")
 */
class Zone
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
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=0)
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree", type="datetime")
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\BookingBundle\Entity\Services", inversedBy="zones")
     * @ORM\JoinTable(name="services_zones",
     *      joinColumns={@ORM\JoinColumn(name="services_id", referencedColumnName="id" )},
     *      inverseJoinColumns={@ORM\JoinColumn(name="zone_id", referencedColumnName="id" )}
     * )
     */

    private $services;

    function __construct()
    {
        $this->services = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Zone
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
     * Set prix
     *
     * @param string $prix
     *
     * @return Zone
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set duree
     *
     * @param \DateTime $duree
     *
     * @return Zone
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Zone
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
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param mixed $services
     */
    public function setServices($services)
    {
        $this->services = $services;
    }
 /*   public function removeService($service)
    {
        //optionally add a check here to see that $group exists before removing it.
        return $this->getServices()->removeZone($service);
    }*/

 /*   function __toString()
    {
        return $this->title;
    }*/
/*    public function serviceRemove(Services $service)
    {
        if ($this->getServices()->contains($service)) {
            $this->getServices()->removeElement($service);
        }

        return $this;
    }*/
    /**
     * Remove zone
     *
     */
    public function serviceRemove(Services $serv)
    {
        $this->getServices()->removeElement($serv);
    }

    /**
     * Add service
     *
     * @param \App\BookingBundle\Entity\Services $service
     *
     * @return Zone
     */
    public function addService(\App\BookingBundle\Entity\Services $service)
    {
        $this->services[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \App\BookingBundle\Entity\Services $service
     */
    public function removeService(\App\BookingBundle\Entity\Services $service)
    {
        $this->services->removeElement($service);
    }
}
