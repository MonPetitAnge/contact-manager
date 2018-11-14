<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Contact;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        // Créer 3 utilisateurs
        for ($i = 1; $i <= 3; $i++) {
            $user = new User();
            $user->setLogin($faker->userName)
                ->setPassword($faker->password);

            $manager->persist($user);

            // On génére quelques contacts pour chacun de ces utilisateurs
            for ($j = 1; $j <= mt_rand(1, 10); $j++) {
                $contact = new Contact();
                $contact->setEmail($faker->email)
                    ->setLastname($faker->lastName)
                    ->setFirstname($faker->firstName)
                    ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                    ->setUser($user);

                $manager->persist($contact);

                // On génère de fausses adresses pour ces contactes
                for ($k = 1; $k <= mt_rand(1, 2); $k++) {
                    $address = new Address();
                    $address->setStreet($faker->streetAddress)
                        ->setCity($faker->city)
                        ->setZip($faker->postcode)
                        ->setCountry('France')
                        ->setContact($contact);

                    $manager->persist($address);
                }
            }
        }

        $manager->flush();
    }
}
