<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Cycle;
use App\Entity\Etablissement;
use App\Entity\Specialite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture
{
    /**
     * @Var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $admin = new Admin();
        $admin->setNom('John')
              ->setPrenom('Doe')
              ->setUuid('90710906')
              ->setRoles(['ROLE_ADMIN'])
              ->setPassword($this->encoder->encodePassword($admin, 'admin'));

        $manager->persist($admin);

        //Création d'établisssement

        $fast = new Etablissement();
        $fast->setLibelle('Faculté des Sciences et Techniques')
            ->setLibelleCourt('FaST');

        $manager->persist($fast);

        $fss = new Etablissement();
        $fss->setLibelle('Faculté des Sciences de la Santé')
            ->setLibelleCourt('FSS');

        $manager->persist($fss);

        //Création de spécialité
        $math = new Specialite();
        $math->setLibelle('Mathématiques');

        $manager->persist($math);

        $phy = new Specialite();
        $phy->setLibelle('Physiques');

        $manager->persist($phy);

        $info = new Specialite();
        $info->setLibelle('Informatique');

        $manager->persist($info);

        $chm = new Specialite();
        $chm->setLibelle('Chimie');

        $manager->persist($chm);

        //Création de cycle
        $lifo = new Cycle();
        $lifo->setLibelle('Licence Fondamentale')
            ->setLibelleCourt('LiFo');

        $manager->persist($lifo);

        $lipro = new Cycle();
        $lipro->setLibelle('Licence Professionnelle')
            ->setLibelleCourt('Licence Pro');

        $manager->persist($lipro);

        $mafo = new Cycle();
        $mafo->setLibelle('Master Fondamentale')
            ->setLibelleCourt('MaFo');

        $manager->persist($mafo);

        $mapro = new Cycle();
        $mapro->setLibelle('Master Professionnel')
            ->setLibelleCourt('Master Pro');

        $manager->persist($mapro);

        $manager->flush();
    }
}
