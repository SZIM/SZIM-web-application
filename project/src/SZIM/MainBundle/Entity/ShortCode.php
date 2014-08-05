<?php

/**
 * Entiti class represent ShortCode record
 *
 * @author Mateusz Antkowiak
 * @version 0.0.1
 */

namespace SZIM\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SZIM\MainBundle\Entity\ShortCode
 * 
 * @ORM\Entity
 * @ORM\Table(name="shortcodes")
 */
class ShortCode {
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $bundle;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $action;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    protected $version;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ShortCode
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
     * Set bundle
     *
     * @param string $bundle
     * @return ShortCode
     */
    public function setBundle($bundle)
    {
        $this->bundle = $bundle;

        return $this;
    }

    /**
     * Get bundle
     *
     * @return string 
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * Set action
     *
     * @param string $action
     * @return ShortCode
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string 
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return ShortCode
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }
}
