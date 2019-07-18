<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Enseignant;
use App\Entity\Roles;
use App\Repository\RolesRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * @var RolesRepository
     */
    private $rolesRepository;

    public function __construct(UserPasswordEncoderInterface $encoder, RolesRepository $rolesRepository)
    {
        $this->encoder = $encoder;
        $this->rolesRepository = $rolesRepository;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        //Fausse données pour les roles
        for ($i = 0; $i < 2; $i++){
            $role = new Roles();
            if($i == 0){
                $role->setName("ROLE_ADMIN")
                    ->setSlug('admin')
                    ->setLevel(1);

                for ($j = 0; $j < 2; $j++) {
                    if ($j == 0) {
                        $user = new Admin();
                        $user->setNom($faker->firstName)
                            ->setPrenom($faker->lastName)
                            ->setContactMail($faker->email)
                            ->setContactCel($faker->e164PhoneNumber)
                            ->setUsername($faker->firstName)
                            ->setPassword($this->encoder->encodePassword($user, 'demo'))
                            ->setRole($role);
                        $user->setType('Principal');
                        $manager->persist($user);
                    } else {
                        $user = new Admin();
                        $user->setNom($faker->firstName)
                            ->setPrenom($faker->lastName)
                            ->setContactMail($faker->email)
                            ->setContactCel($faker->e164PhoneNumber)
                            ->setUsername($faker->firstName)
                            ->setPassword($this->encoder->encodePassword($user, 'demo'))
                            ->setRole($role);
                        $user->setType('Secondaire');
                        $manager->persist($user);
                    }
                }
            }else{
                $role->setName("ROLE_USER")
                    ->setSlug('user')
                    ->setLevel(2);

                for ($j = 0; $j < 2; $j++) {
                    if ($j == 0) {
                        $user = new Enseignant();
                        $user->setTitre('Docteur')
                            ->setTitreAbrege('Dr')
                            ->setNom($faker->firstName)
                            ->setPrenom($faker->lastName)
                            ->setContactMail($faker->email)
                            ->setContactCel($faker->e164PhoneNumber)
                            ->setUsername($faker->firstName)
                            ->setPassword($this->encoder->encodePassword($user, 'demo'))
                            ->setRole($role);

                        $manager->persist($user);
                    }else{
                        $user = new Enseignant();
                        $user->setTitre('Monsieur')
                            ->setTitreAbrege('Mr')
                            ->setNom($faker->firstName)
                            ->setPrenom($faker->lastName)
                            ->setContactMail($faker->email)
                            ->setContactCel($faker->e164PhoneNumber)
                            ->setUsername($faker->firstName)
                            ->setPassword($this->encoder->encodePassword($user, 'demo'))
                            ->setRole($role);

                        $manager->persist($user);
                    }
                }
            }


            $manager->persist($role);

            $manager->flush();
        }
    }
}
