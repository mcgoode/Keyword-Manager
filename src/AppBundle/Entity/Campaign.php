<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Campaign
 *
 * Unique constraint to prevent registering campaigns with the same keyword, shortcode and  endDate
 * @ORM\Table(name="campaign", uniqueConstraints={@UniqueConstraint(name="campaign_uq", columns={"keyword","shortcode_id", "active"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CampaignRepository")
 * @UniqueEntity(fields={"keyword","shortcode","active"}, message="There is already an acitve campaign on they keyword and shorcode!")
 */
class Campaign
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
     *
     * @ORM\Column(name="keyword", type="string", length=255)
     */
    private $keyword;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ServiceProvider")
     */
    private $shortcode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date", nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="date", nullable=true)
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="createdBy", type="string", length=255, nullable=true)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdOn", type="date")
     */
    private $createdOn;

    /**
     * @var string
     *
     * @ORM\Column(name="removedBy", type="string", length=255, nullable=true)
     */
    private $removedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="removedOn", type="date", nullable=true)
     */
    private $removedOn;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="Product",inversedBy="campaigns")
     * @ORM\JoinColumn(name="productId", referencedColumnName="id")
     */
    private $product;


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
     * Set keyword
     *
     * @param string $keyword
     *
     * @return Campaign
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword
     *
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set shortcode
     *
     * @param integer $shortcode
     *
     * @return Campaign
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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Campaign
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Campaign
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     * @return Campaign
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
     * Set removedBy
     *
     * @param string $removedBy
     *
     * @return Campaign
     */
    public function setRemovedBy($removedBy)
    {
        $this->removedBy = $removedBy;

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
     * Set removedOn
     *
     * @param \DateTime $removedOn
     *
     * @return Campaign
     */
    public function setRemovedOn($removedOn)
    {
        $this->removedOn = $removedOn;

        return $this;
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Campaign
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
     * Set product
     *
     * @param string $product
     *
     * @return Campaign
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set createdBy.
     *
     * @param string|null $createdBy
     *
     * @return Campaign
     */
    public function setCreatedBy($createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy.
     *
     * @return string|null
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}
