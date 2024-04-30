<?php

namespace App\Entity;

use App\Repository\ContactDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactDetailRepository::class)]
class ContactDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $value = null;

    #[ORM\ManyToOne(inversedBy: 'contactDetails')]
    private ?Address $Address = null;

    #[ORM\ManyToOne(inversedBy: 'contactDetails')]
    private ?Phone $Phone = null;

    #[ORM\ManyToOne(inversedBy: 'contactDetails')]
    private ?Email $Email = null;

    #[ORM\ManyToOne(inversedBy: 'contactDetails')]
    private ?Website $Website = null;

    #[ORM\ManyToOne(inversedBy: 'contact_has_detail')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Contact $contact = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->Address;
    }

    public function setAddress(?Address $Address): static
    {
        $this->Address = $Address;

        return $this;
    }

    public function getPhone(): ?Phone
    {
        return $this->Phone;
    }

    public function setPhone(?Phone $Phone): static
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getEmail(): ?Email
    {
        return $this->Email;
    }

    public function setEmail(?Email $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getWebsite(): ?Website
    {
        return $this->Website;
    }

    public function setWebsite(?Website $Website): static
    {
        $this->Website = $Website;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): static
    {
        $this->contact = $contact;

        return $this;
    }
}
