<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PhoneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $phone = new Phone();
        $phone->setPattern('(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}');
        $manager->persist($phone);

        $manager->flush();
    }
}
