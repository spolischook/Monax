<?php

namespace Acme\DemoBundle\DataFixtures\ORM;

use Acme\DemoBundle\Entity\Missionary;
use Acme\DemoBundle\DataFixtures\AbstractFixtureLoad;

class LoadMissionaryData extends AbstractFixtureLoad
{
    public function __construct()
    {
        $this->setEntityName('missionary');
    }

    public function getNewObject()
    {
        return new Missionary();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}