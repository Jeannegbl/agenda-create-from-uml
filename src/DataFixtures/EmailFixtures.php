<?php

namespace App\DataFixtures;

use App\Entity\Email;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmailFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $email = new Email();
        $email->setPattern('^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$');
        $manager->persist($email);

        $manager->flush();
    }
}
