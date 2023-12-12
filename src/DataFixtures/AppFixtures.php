<?php

namespace App\DataFixtures;

use App\Entity\Gestionnaire;
use App\Entity\Utilisateur;
use App\Entity\Cellulaire;
use App\Entity\Ordinateur;
use App\Entity\Peripherique;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $gestionnaire = new Gestionnaire();
        $gestionnaire->setEmail('gestionnaire@gmail.com');
        $gestionnaire->setPassword('password');
        $gestionnaire->setRoles(['ROLE_TEST']);
        $manager->persist($gestionnaire);

        $prenoms = [
            "Adam",
            "Bastien",
            "Charles",
            "Dimitri",
            "Eric",
            "Francois",
            "Helene",
            "Ian",
            "Jebediah",
            "Kevin",
            "Leon",
            "Melissa",
            "Norman",
            "Olivier",
            "Patrice",
            "Quentin",
            "Rufus",
            "Sonia",
            "Thomas",
            "Uriel",
            "Vincent",
            "William",
            "Xavier",
            "Yanis",
        ];

        $noms = [
            "Bernard",
            "Cordova",
            "Demers",
            "Evlashenko",
            "Francois",
            "Gaillard",
            "Irving",
            "Jonas",
            "Kerman",
            "Lederman",
            "McKinnon",
            "Nonat",
            "Oppenheimer",
            "Peremont",
            "Quinoa",
            "Ratteau",
            "Savage",
            "Turmel",
            "Uderzo",
            "Vendermo",
            "Wanderbrown",
            "Xalini",
            "Yollanda",
            "Zubeidaa",
        ];

        for($i = 0; $i < 24; $i++)
        {
            $utilisateur = new Utilisateur();
            $utilisateur->setPrenom($prenoms[$i]);
            $utilisateur->setNom($noms[$i]);
            $manager->persist($utilisateur);
        }

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

        for($i = 0; $i < 100;$i++)
        {
            $cellulaire = new Cellulaire();
            $cellulaire->setNumeroSerie(2000+$i);
            $cellulaire->setEtatDisponible(True);
            $cellulaire->setMarque("Samsung");
            $cellulaire->setModele("Galaxy S23 Ultra");
            $cellulaire->setDateAcquisition(new \DateTimeImmutable("2023-06-15"));
            $cellulaire->setDateSortie(new \DateTimeImmutable("2023-02-01"));
            $cellulaire->setSysteme("Android 13, One UI 5.1");
            $cellulaire->setCpu("Octa-core (1x3.36 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510)");
            $cellulaire->setGpu("Adreno 740");
            $cellulaire->setMemoire(8);
            $cellulaire->setStockage(512);
            $cellulaire->setCardSlot(8);
            $cellulaire->setNotes("Ceci est un ensemble de notes pertinentes pour le cellulaire ". 1+ $i);
            $manager->persist($cellulaire);
        }

        $manager->flush();

        $typesPeripheriques = ['Clavier','Souris','Webcam','Disque externe','Cle usb','Ecran'];
        $marquesPeripheriques = ['Cooler Master','Red Dragon','Logitech','Seagate','Kingston','Asus'];
        $modelesPeripheriques = ['SK650','Impact Elite M913','1080 HD','Firecuda','DataTraveler','VA24DQ'];
        for($i = 0; $i < 100;$i++)
        {
            $j = rand(0,5);
            $peripherique = new Peripherique();
            $peripherique->setNumeroSerie(1000+$i);
            $peripherique->setEtatDisponible(rand(0,1));
            $peripherique->setType($typesPeripheriques[$j]);
            $peripherique->setMarque($marquesPeripheriques[$j]);
            $peripherique->setModele($modelesPeripheriques[$j]);
            $peripherique->setNotes("Ceci est un ensemble de notes pertinentes pour le peripherique ". 1+ $i);
            $manager->persist($peripherique);
        }

        $manager->flush();
    }
}
