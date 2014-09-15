<?php

/**
 * Entiti class represent ShortCode record
 *
 * @author Mateusz Antkowiak
 * @version 0.0.2
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
     * @ORM\Column(type="string", length=50)
     */
    protected $package;

/**
     * @ORM\Column(type="string", length=50)
     */
    protected $controller_name;

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

    /**
     * Set package
     *
     * @param string $package
     * @return ShortCode
     */
    public function setPackage($package)
    {
        $this->package = $package;
    
        return $this;
    }

    /**
     * Get package
     *
     * @return string 
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Set controller_name
     *
     * @param string $controllerName
     * @return ShortCode
     */
    public function setControllerName($controllerName)
    {
        $this->controller_name = $controllerName;
    
        return $this;
    }

    /**
     * Get controller_name
     *
     * @return string 
     */
    public function getControllerName()
    {
        return $this->controller_name;
    }
}
