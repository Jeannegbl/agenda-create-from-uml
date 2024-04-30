<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $lastname = null;

    /**
     * @var Collection<int, ContactDetail>
     */
    #[ORM\OneToMany(targetEntity: ContactDetail::class, mappedBy: 'contact', orphanRemoval: true)]
    private Collection $contact_has_detail;

    #[ORM\ManyToOne(inversedBy: 'Contact')]
    private ?Agenda $agenda = null;

    public function __construct()
    {
        $this->contact_has_detail = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    /**
     * @return Collection<int, ContactDetail>
     */
    public function getContactHasDetail(): Collection
    {
        return $this->contact_has_detail;
    }

    public function addContactHasDetail(ContactDetail $contactHasDetail): static
    {
        if (!$this->contact_has_detail->contains($contactHasDetail)) {
            $this->contact_has_detail->add($contactHasDetail);
            $contactHasDetail->setContact($this);
        }

        return $this;
    }

    public function removeContactHasDetail(ContactDetail $contactHasDetail): static
    {
        if ($this->contact_has_detail->removeElement($contactHasDetail)) {
            // set the owning side to null (unless already changed)
            if ($contactHasDetail->getContact() === $this) {
                $contactHasDetail->setContact(null);
            }
        }

        return $this;
    }

    public function getAgenda(): ?Agenda
    {
        return $this->agenda;
    }

    public function setAgenda(?Agenda $agenda): static
    {
        $this->agenda = $agenda;

        return $this;
    }
}
