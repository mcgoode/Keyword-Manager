<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 1,
     *     max = 200,
     *     minMessage = "Client name must be at least {{ limit }} characters long.",
     *     maxMessage = "Client name cannot be longer than {{ limit }} characters."
     * )
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 5,
     *     max = 200,
     *     minMessage = "Client address must be at least {{ limit }} characters long.",
     *     maxMessage = "Client address cannot be longer than {{ limit }} characters."
     * )
     * @ORM\Column(name="addressOne", type="string", length=255)
     */
    private $addressOne;

    /**
     * @var string
     *
     * @ORM\Column(name="addressTwo", type="string", length=255, nullable=true)
     */
    private $addressTwo;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage="Client city must be at least {{ limit }} characters long.",
     *     maxMessage="Client city cannot be longer than {{ limit }} characters."
     * )
     * @ORM\Column(name="City", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 2,
     *     max = 200,
     *     minMessage="Client state must be at least {{ limit }} characters long.",
     *     maxMessage="Client state cannot be longer than {{ limit }} characters."
     * )
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 5,
     *     max = 5,
     *     minMessage="Client address must be at least {{ limit }} characters long.",
     *     maxMessage="Client address cannot be longer than {{ limit }} characters."
     * )
     * @ORM\Column(name="zipFive", type="integer")
     */
    private $zipFive;

    /**
     * Defaults to true state meaning it does exist in the service providers application.
     *
     * @var bool
     *
     * @Assert\Choice({"True","False"})
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     *
     * @ORM\OneToMany(targetEntity="Product", mappedBy="client")
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
     * Set zipFive
     *
     * @param integer $zipFive
     *
     * @return Client
     */
    public function setZipFive($zipFive)
    {
        $this->zipFive = $zipFive;

        return $this;
    }

    /**
     * Get zipFive
     *
     * @return int
     */
    public function getZipFive()
    {
        return $this->zipFive;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Client
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection $products
     */
    public function setProducts(ArrayCollection $products)
    {
        $this->products = $products;
    }

    /**
     * Add product.
     *
     * @param Product $product
     *
     * @return Client
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product.
     *
     * @param Product $product
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProduct(Product $product)
    {
        return $this->products->removeElement($product);
    }
}
