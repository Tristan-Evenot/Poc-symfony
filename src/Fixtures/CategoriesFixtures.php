<?php


namespace App\Fixtures;


use App\Entity\Categorie;

class CategoriesFixtures
{

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $categorie = new Categorie();

            $categorie
                ->setNom('catégorie-' . ($i + 1));
            $manager->persist($categorie);
        }

        $manager->flush();
    }
}