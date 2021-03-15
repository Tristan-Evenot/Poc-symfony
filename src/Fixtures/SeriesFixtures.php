<?php


namespace App\Fixtures;


class SeriesFixtures
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $utilisateur = new Utilisateur();
            $password = '123456';

            $utilisateur
                ->setEmail('utilisateur-' . ($i + 1) . '@gmail.com')
                ->setPassword($this->encoder->encodePassword($utilisateur, $password));

            $manager->persist($utilisateur);
        }

        $manager->flush();
    }
}