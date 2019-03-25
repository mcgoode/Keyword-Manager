<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Product
 *
 * Client cannot have two of the same product names, easily removed, but keeps duplicate data down
 *
 * @ORM\Table(name="product",uniqueConstraints={@UniqueConstraint(name="product_uq", columns={"name", "client"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductsRepository")
 */
class Product
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
     *     minMessage = "Product name must be at least {{ limit }} characters long.",
     *     maxMessage = "Product name cannot be longer than {{ limit }} characters."
     * )
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @Assert\DateTime()
     *
     * @ORM\Column(name="createdOn", type="date")
     */
    private $createdOn;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="createdBy", type="string", length=255)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @Assert\DateTime()
     *
     * @ORM\Column(name="removedOn", type="date", length=255, nullable=true)
     */
    private $removedOn;

    /**
     * @var string
     *
     * @ORM\Column(name="removedBy", type="string", length=255, nullable=true)
     */
    private $removedBy;

    /**
     * @var Client
     *
     * @ORM\OneToMany(targetEntity="Client", mappedBy="products")
     */
    private $client;

    /**
     * @var Campaign
     *
     * @ORM\ManyToOne(targetEntity="Campaign", inversedBy="product")
     * @ORM\JoinColumn(name="campaigns", referencedColumnName="id")
     */
    private $campaigns;

    public function __construct()
    {
        $this->campaigns = new ArrayCollection();
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
     * @return Product
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
     * Set addedOn
     *
     * @param \DateTime $createdOn
     *
     * @return Product
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return Product
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get addedBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Get removedOn
     *
     * @return \DateTime
     */
    public function getRemovedOn()
    {
        return $this->removedOn;
    }

    /**
     * Set removedOn
     * @param \DateTime $removedOn
     *
     * @return Product
     */
    public function setRemovedOn($removedOn)
    {
        $this->removedOn = $removedOn;

        return $this;
    }

    /**
     * Get removedBy
     *
     * @return string
     */
    public function getRemovedBy()
    {
        return $this->removedBy;
    }

    /**
     * Set removedBy
     *
     * @param string $removedBy
     *
     * @return Product
     */
    public function setRemovedBy($removedBy)
    {
        $this->removedBy = $removedBy;

        return $this;
    }

    /**
     * Set client
     *
     * @param string $client
     *
     * @return Product
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return mixed
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }

    /**
     * @param mixed $campaigns
     */
    public function setCampaigns($campaigns)
    {
        $this->campaigns = $campaigns;
    }
}

