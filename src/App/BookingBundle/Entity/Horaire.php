<?php

namespace App\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horaire
 *
 * @ORM\Table(name="horaire")
 * @ORM\Entity(repositoryClass="App\BookingBundle\Repository\HoraireRepository")
 */
class Horaire
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
     * @ORM\ManyToOne(targetEntity="App\BookingBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="cascade")
     */
    protected $user_id;
    /**
     * @var int
     *
     * @ORM\Column(name="index_jour", type="integer", unique=false)
     */
    private $indexJour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="time",nullable=true)
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="time",nullable=true)
     */
    private $endTime;


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
     * Set indexJour
     *
     * @param integer $indexJour
     *
     * @return Horaire
     */
    public function setIndexJour($indexJour)
    {
        $this->indexJour = $indexJour;

        return $this;
    }

    /**
     * Get indexJour
     *
     * @return int
     */
    public function getIndexJour()
    {
        return $this->indexJour;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     *
     * @return Horaire
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     *
     * @return Horaire
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

}
