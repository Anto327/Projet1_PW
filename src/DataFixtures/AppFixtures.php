<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Educateur;
use App\Entity\Licencie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $default_categorie = new Categorie();
        $default_categorie->setNom('Administrators')
            ->setCodeRaccourci('ADMINS');
        $manager->persist($default_categorie);

        $default_licencie = new Licencie();
        $default_licencie->setNumLicence(0)
            ->setNom('Admin')
            ->setPrenom('Admin')
            ->setCategorie($default_categorie);
        $manager->persist($default_licencie);

        $default_admin = new Educateur();
        $default_admin->setRoles(['ROLE_ADMIN'])
            ->setEmail('admin@admin.com')
            ->setPassword(password_hash('123', PASSWORD_DEFAULT))
            ->setLicencie($default_licencie);
        $manager->persist($default_admin);

        $manager->flush();
    }
}
