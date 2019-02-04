<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for($i = 0; $i < 100; $i++) {
            $comment = new Comment();

            $comment->setContent($faker->text(200));
            $comment->setLikes($faker->numberBetween(0, 100));
            $comment->setDislikes($faker->numberBetween(0, 100));

            $manager->persist($comment);
        }

        $manager->flush();
    }
}
