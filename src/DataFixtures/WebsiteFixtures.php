<?php

namespace App\DataFixtures;

use App\Entity\Website;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WebsiteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $website = new Website();
        $website->setPattern('https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)');
        $manager->persist($website);

        $manager->flush();
    }
}
