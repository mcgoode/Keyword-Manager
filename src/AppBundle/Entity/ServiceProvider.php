<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceProvider
 *
 * @ORM\Table(name="service_provider")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceProviderRepository")
 */
class ServiceProvider
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
     * @var int
     *
     * @ORM\Column(name="provider", type="integer")
     */
    private $provider;

    /**
     * @var int
     *
     * @ORM\Column(name="shortcode", type="integer")
     */
    private $shortcode;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="addedBy", type="string", length=255)
     */
    private $addedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addedOn", type="date")
     */
    private $addedOn;

    /**
     * @var string
     *
     * @ORM\Column(name="deactivatedBy", type="string", length=255)
     */
    private $deactivatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deactivedOn", type="date")
     */
    private $deactivedOn;


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
     * Set provider
     *
     * @param integer $provider
     *
     * @return ServiceProvider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Get provider
     *
     * @return int
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set shortcode
     *
     * @param integer $shortcode
     *
     * @return ServiceProvider
     */
    public function setShortcode($shortcode)
    {
        $this->shortcode = $shortcode;

        return $this;
    }

    /**
     * Get shortcode
     *
     * @return int
     */
    public function getShortcode()
    {
        return $this->shortcode;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return ServiceProvider
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set addedBy
     *
     * @param string $addedBy
     *
     * @return ServiceProvider
     */
    public function setAddedBy($addedBy)
    {
        $this->addedBy = $addedBy;

        return $this;
    }

    /**
     * Get addedBy
     *
     * @return string
     */
    public function getAddedBy()
    {
        return $this->addedBy;
    }

    /**
     * Set addedOn
     *
     * @param \DateTime $addedOn
     *
     * @return ServiceProvider
     */
    public function setAddedOn($addedOn)
    {
        $this->addedOn = $addedOn;

        return $this;
    }

    /**
     * Get addedOn
     *
     * @return \DateTime
     */
    public function getAddedOn()
    {
        return $this->addedOn;
    }

    /**
     * Set deactivatedBy
     *
     * @param string $deactivatedBy
     *
     * @return ServiceProvider
     */
    public function setDeactivatedBy($deactivatedBy)
    {
        $this->deactivatedBy = $deactivatedBy;

        return $this;
    }

    /**
     * Get deactivatedBy
     *
     * @return string
     */
    public function getDeactivatedBy()
    {
        return $this->deactivatedBy;
    }

    /**
     * Set deactivedOn
     *
     * @param \DateTime $deactivedOn
     *
     * @return ServiceProvider
     */
    public function setDeactivedOn($deactivedOn)
    {
        $this->deactivedOn = $deactivedOn;

        return $this;
    }

    /**
     * Get deactivedOn
     *
     * @return \DateTime
     */
    public function getDeactivedOn()
    {
        return $this->deactivedOn;
    }
}

