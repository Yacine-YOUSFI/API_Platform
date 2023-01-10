<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory as ExceptionFactory;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $fake = Factory::Create();
        for ($u = 0; $u<10; $u++){
            $user = new User();
            $passHash = $this->encoder->encodePassword($user, 'password');
            $user->setEmail($fake->email)
                 ->setPassword($passHash);
            $manager->persist($user);
        }
        for ($a = 0; $a<10; $a++){
            $article = new Article();
            $article->setAuthor($user)
                    ->setContent($fake->text(100))
                    ->setName($fake->text(100));
            $manager->persist($article);
        }
        $manager->flush();
    }
}
