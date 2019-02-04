<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for($i = 0; $i < 50; $i++) {
            $user = new User();

            $user->setFirstName($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setEmail($faker->email);
            $user->setUserLevel($faker->numberBetween(0,5));
            $user->setRole($faker->randomElement(["admin", "editor", "invitado"]));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
