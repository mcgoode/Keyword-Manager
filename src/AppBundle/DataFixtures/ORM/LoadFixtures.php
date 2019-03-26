<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager,[
            'providers' => [$this]
        ]);
    }

    public function product()
    {

        return 'product_'.random_int(0,999999999);
    }
}