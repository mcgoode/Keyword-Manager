<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campaign
 *
 * @ORM\Table(name="campaign")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CampaignRepository")
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
     * @ORM\Column(name="keyword", type="string", length=255)
     */
    private $keyword;

    /**
     * @var int
     *
     * @ORM\Column(name="shortcode", type="integer")
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
     * @ORM\Column(name="removedBy", type="string", length=255)
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
     * @ORM\Column(name="isKeywordDeactivated", type="boolean")
     */
    private $isKeywordDeactivated;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="product", inversedBy="campaigns")
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
     * Set addedBy
     *
     * @param $createdBy
     *
     * @return Campaign
     */
    public function setAddedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get addedBy
     *
     * @return string
     */
    public function getAddedBy()
    {
        return $this->createdBy;
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
     * Set isKeywordDeactivated
     *
     * @param boolean $isKeywordDeactivated
     *
     * @return Campaign
     */
    public function setIsKeywordDeactivated($isKeywordDeactivated)
    {
        $this->isKeywordDeactivated = $isKeywordDeactivated;

        return $this;
    }

    /**
     * Get isKeywordDeactivated
     *
     * @return bool
     */
    public function getIsKeywordDeactivated()
    {
        return $this->isKeywordDeactivated;
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
}

