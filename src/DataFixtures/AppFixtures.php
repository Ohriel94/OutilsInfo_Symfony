<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Ordinateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setEmail('user@gmail.com');
        $user->setPassword('password');
        $user->setRoles(['ROLE_TEST']);
        $manager->persist($user);

        for($i = 0; $i < 100;$i++)
        {
            $ordinateur = new Ordinateur();
            $ordinateur->setNumeroSerie(1000+$i);
            $ordinateur->setEtatDisponible(True);
            $ordinateur->setMarque("Dell");
            $ordinateur->setModele("Vostro 5502");
            $ordinateur->setDateAcquisition(new \DateTimeImmutable("2021-06-03"));
            $ordinateur->setDateSortie(new \DateTimeImmutable("2020-12-13"));
            $ordinateur->setSysteme("Windows 10 64x");
            $ordinateur->setCpu("intel core i7-1165G7 @ 2.80Ghz (6 cores)");
            $ordinateur->setGpu("Nvidia GeForce RTX 3060 12GB");
            $ordinateur->setMemoire(16);
            $ordinateur->setDisques([512,1000]);
            $ordinateur->setNotes("Ceci est un ensemble de notes pertinentes pour l'ordinateur ". 1+ $i);
            $manager->persist($ordinateur);
        }

        $manager->flush();
    }
}
