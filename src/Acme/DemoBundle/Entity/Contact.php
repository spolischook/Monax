<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Contact
 *
 * @ORM\Entity(repositoryClass="Acme\DemoBundle\Entity\ContactRepository")
 * @ORM\Table(name="sf2_contact")
 */
class Contact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\ManyToMany(targetEntity="ContactGroup", inversedBy="contacts")
     */
    private $contactGroups;

    public function __construct()
    {
        $this->contactGroups = new ArrayCollection();
    }

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
     * Set fullName
     *
     * @param string $fullName
     * @return Contact
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    
        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Contact
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add contactGroups
     *
     * @param \Acme\DemoBundle\Entity\ContactGroup $contactGroups
     * @return Contact
     */
    public function addContactGroup(\Acme\DemoBundle\Entity\ContactGroup $contactGroups)
    {
        $this->contactGroups[] = $contactGroups;

        return $this;
    }

    /**
     * Remove contactGroups
     *
     * @param \Acme\DemoBundle\Entity\ContactGroup $contactGroups
     */
    public function removeContactGroup(\Acme\DemoBundle\Entity\ContactGroup $contactGroups)
    {
        $this->contactGroups->removeElement($contactGroups);
    }

    /**
     * Get contactGroups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactGroups()
    {
        return $this->contactGroups;
    }

    public function __toString()
    {
        return$this->fullName;
    }
}