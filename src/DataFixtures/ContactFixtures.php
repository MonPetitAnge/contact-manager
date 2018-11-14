<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=1; $i<= 10; $i++){
            $contact = new Contact();
            $contact->setFirstname("Nom du contact n°$i")
                    ->setLastname("Prénom du contact n°$i")
                    ->setEmail("email@email$i.com")
                    ->setCreatedAt(new \DateTime());
            $manager->persist($contact);
        }

        $manager->flush();
    }
}
