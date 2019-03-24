<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="addressOne", type="string", length=255)
     */
    private $addressOne;

    /**
     * @var string
     *
     * @ORM\Column(name="addressTwo", type="string", length=255)
     */
    private $addressTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var int
     *
     * @ORM\Column(name="zipFour", type="integer")
     */
    private $zipFour;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="client")
     * @ORM\JoinColumn(name="client", referencedColumnName="id")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set addressOne
     *
     * @param string $addressOne
     *
     * @return Client
     */
    public function setAddressOne($addressOne)
    {
        $this->addressOne = $addressOne;

        return $this;
    }

    /**
     * Get addressOne
     *
     * @return string
     */
    public function getAddressOne()
    {
        return $this->addressOne;
    }

    /**
     * Set addressTwo
     *
     * @param string $addressTwo
     *
     * @return Client
     */
    public function setAddressTwo($addressTwo)
    {
        $this->addressTwo = $addressTwo;

        return $this;
    }

    /**
     * Get addressTwo
     *
     * @return string
     */
    public function getAddressTwo()
    {
        return $this->addressTwo;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Client
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Client
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zipFour
     *
     * @param integer $zipFour
     *
     * @return Client
     */
    public function setZipFour($zipFour)
    {
        $this->zipFour = $zipFour;

        return $this;
    }

    /**
     * Get zipFour
     *
     * @return int
     */
    public function getZipFour()
    {
        return $this->zipFour;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Client
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
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }
}

