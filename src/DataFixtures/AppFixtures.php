<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Doctor;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 30; $i++) {
            $doctor = new Doctor();
            $doctor->setFirstname($faker->firstName());
            $doctor->setLastname($faker->lastName());
            $doctor->setSpeciality($faker->jobTitle());
            $doctor->setAddress($faker->streetAddress());
            $doctor->setCity($faker->city());
            $doctor->setZip($faker->postcode());
            $doctor->setPhone($faker->phoneNumber());

            $manager->persist($doctor);
        }

        $manager->flush();

    }
}