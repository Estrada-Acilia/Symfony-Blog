<?php

namespace App\DataFixtures;

use App\Entity\Story;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class StoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for($i = 0; $i < 50; $i++) {
            $story = new Story();

            $story->setTitle($faker->sentence($faker->numberBetween(1, 8)));
            $story->setContent($faker->text(1000));
            $story->setType($faker->randomElement(["text", "image", "text_image"]));
            $story->setImagePath($faker->imageUrl());
            $story->setLikes($faker->numberBetween(0, 100));
            $story->setDislikes($faker->numberBetween(0, 100));
            $story->setShare($faker->numberBetween(0, 100));

            $manager->persist($story);
        }

        $manager->flush();
    }
}
