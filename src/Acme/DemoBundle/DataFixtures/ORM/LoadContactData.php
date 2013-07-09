<?php

namespace Acme\DemoBundle\DataFixtures\ORM;

use Acme\DemoBundle\Entity\Contact;
use Acme\DemoBundle\DataFixtures\AbstractFixtureLoad;

class LoadContactData extends AbstractFixtureLoad
{
    public function __construct()
    {
        $this->setEntityName('contact');
    }

    public function getNewObject()
    {
        return new Contact();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }
}