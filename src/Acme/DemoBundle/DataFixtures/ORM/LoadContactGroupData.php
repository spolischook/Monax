<?php

namespace Acme\DemoBundle\DataFixtures\ORM;

use Acme\DemoBundle\Entity\ContactGroup;
use Acme\DemoBundle\DataFixtures\AbstractFixtureLoad;

class LoadContactGroupData extends AbstractFixtureLoad
{
    public function __construct()
    {
        $this->setEntityName('contactGroup');
    }

    public function getNewObject()
    {
        return new ContactGroup();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 3;
    }
}