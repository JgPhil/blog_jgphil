<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $me = new User;
        $me->setEmail("jamingph@gmail.com")
            ->setBirthdate(new DateTime("1980/11/05"))
            ->setFirstname("Philippe")
            ->setLastname("Jaming")
            ->setPassword(password_hash("C@ch@b3ll3", PASSWORD_BCRYPT))
            ->setRoles(["ROLE_ADMIN"])
            ->setPassions(["Famille", "Informatique", "Sport"]);

        $manager->persist($me);

        $manager->flush();
    }
}
