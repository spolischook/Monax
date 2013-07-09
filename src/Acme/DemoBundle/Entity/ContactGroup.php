<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Entity
 * @ORM\Table(name="sf2_contact_group")
 */
class ContactGroup
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(
     *      targetEntity="Contact",
     *      mappedBy="contactGroups",
     *      cascade={"persist"}
     * )
     */
    private $contacts;

    /**
     * @ORM\ManyToOne(targetEntity="Missionary", inversedBy="contactGroups")
     */
    private $missionary;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return ContactGroup
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
     * Add contacts
     *
     * @param \Acme\DemoBundle\Entity\Contact $contacts
     * @return ContactGroup
     */
    public function addContact(\Acme\DemoBundle\Entity\Contact $contacts)
    {
        $this->contacts[] = $contacts;
        $contacts->addContactGroup($this);
    
        return $this;
    }

    /**
     * Remove contacts
     *
     * @param \Acme\DemoBundle\Entity\Contact $contacts
     */
    public function removeContact(\Acme\DemoBundle\Entity\Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
        $contacts->removeContactGroup($this);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set missionary
     *
     * @param \Acme\DemoBundle\Entity\Missionary $missionary
     * @return ContactGroup
     */
    public function setMissionary(\Acme\DemoBundle\Entity\Missionary $missionary = null)
    {
        $this->missionary = $missionary;
    
        return $this;
    }

    /**
     * Get missionary
     *
     * @return \Acme\DemoBundle\Entity\Missionary 
     */
    public function getMissionary()
    {
        return $this->missionary;
    }

    public function __toString()
    {
        return $this->name;
    }
}