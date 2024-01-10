<?php

namespace App\Entity;

use App\Repository\EducateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateurRepository::class)]
class Educateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Licencie $licencie = null;

    #[ORM\Column]
    private ?bool $isAdmin = null;

    #[ORM\ManyToMany(targetEntity: MailEdu::class, mappedBy: 'educateurs')]
    private Collection $mailEdus;

    public function __construct()
    {
        $this->mailEdus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getLicencie(): ?Licencie
    {
        return $this->licencie;
    }

    public function setLicencie(Licencie $licencie): static
    {
        $this->licencie = $licencie;

        return $this;
    }

    public function isIsAdmin(): ?bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): static
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * @return Collection<int, MailEdu>
     */
    public function getMailEdus(): Collection
    {
        return $this->mailEdus;
    }

    public function addMailEdu(MailEdu $mailEdu): static
    {
        if (!$this->mailEdus->contains($mailEdu)) {
            $this->mailEdus->add($mailEdu);
            $mailEdu->addEducateur($this);
        }

        return $this;
    }

    public function removeMailEdu(MailEdu $mailEdu): static
    {
        if ($this->mailEdus->removeElement($mailEdu)) {
            $mailEdu->removeEducateur($this);
        }

        return $this;
    }
}
