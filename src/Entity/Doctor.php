<?php

namespace App\Entity;

use App\Repository\DoctorRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Validator\Constraints as Assert; // https://symfony.com/doc/current/validation.html


#[ORM\Entity(repositoryClass: DoctorRepository::class)]
#[ApiResource]
class Doctor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\Length(min: 2, max: 50)]
    #[ORM\Column(length: 50)]
    private ?string $firstname = null;

    #[Assert\Length(min: 2, max: 50)]
    #[ORM\Column(length: 50)]
    private ?string $lastname = null;

    #[Assert\Choice([
        "Cardiologie",
        "Dermatologie",
        "Neurologie",
        "Pédiatrie",
        "Oncologie",
        "Psychiatrie",
        "Chirurgie générale",
        "Gynécologie-obstétrique",
        "Ophtalmologie",
        "Anesthésiologie"
    ])]
    #[Assert\NotBlank()]
    #[ORM\Column(length: 50)]
    private ?string $speciality = null;

    #[Assert\Length(min: 5, max: 255)]
    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[Assert\Length(min: 5, max: 50)]
    #[ORM\Column(length: 50)]
    private ?string $city = null;

    #[Assert\Regex('/^\d{5}$/')] // 5 digits
    #[ORM\Column(length: 5)]
    private ?string $zip = null;

    #[Assert\Regex('/^\d{10}$/')] // 10 digits
    #[ORM\Column(length: 12, nullable: true)]
    private ?string $phone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(string $speciality): static
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): static
    {
        $this->zip = $zip;

        return $this;
    }

    public function getPhone(): ?string
    {
        if (strlen($this->phone) === 10) { // https://www.php.net/manual/fr/function.wordwrap.php
            $phone = preg_replace('/[^0-9]/', '', $this->phone); // https://www.php.net/manual/fr/function.preg-replace.php
            return wordwrap($phone, 2, ' ', true); // https://www.php.net/manual/fr/function.wordwrap.php

        }
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }
}
