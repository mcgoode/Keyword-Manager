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

        return 'product_'.random_int(0,999999);
    }

    public function provider()
    {
        $providers = [
            'Provider_1',
            'Provider_2',
            'Provider_3',
            'Provider_4',
            'Provider_5',
        ];
        $key = array_rand($providers);
        return $providers[$key];
    }
}