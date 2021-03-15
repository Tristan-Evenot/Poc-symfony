<?php


namespace App\Fixtures;


use App\Entity\Serie;

class UtilisateursFixtures
{
    private $encoder;


    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $serie = new Serie();
            $serie
                ->setNom('Série-' . ($i + 1));

            $manager->persist($serie);
        }

        $manager->flush();
    }
}