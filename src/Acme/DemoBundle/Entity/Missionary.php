<?php
// src/Acme/UserBundle/Entity/User.php

namespace Acme\DemoBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class Missionary extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="ContactGroup", mappedBy="missionary")
     */
    protected $contactGroups;

    public function __construct()
    {
        parent::__construct();

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
     * Add contactGroups
     *
     * @param \Acme\DemoBundle\Entity\ContactGroup $contactGroups
     * @return Missionary
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
}