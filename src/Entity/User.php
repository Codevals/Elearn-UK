<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "admin" = "Admin", "enseignant" = "Enseignant"})
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactCel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactMail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Roles", inversedBy="users")
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Document", mappedBy="createdBy")
     */
    private $documentOwner;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Document", mappedBy="updatedBy")
     */
    private $documentUpdater;

    public function __construct()
    {
        $this->documentOwner = new ArrayCollection();
        $this->documentUpdater = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getContactCel(): ?string
    {
        return $this->contactCel;
    }

    public function setContactCel(string $contactCel): self
    {
        $this->contactCel = $contactCel;

        return $this;
    }

    public function getContactMail(): ?string
    {
        return $this->contactMail;
    }

    public function setContactMail(string $contactMail): self
    {
        $this->contactMail = $contactMail;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function serialize()
    {
        // TODO: Implement serialize() method.
        return serialize([
            $this->id,
            $this->nom,
            $this->prenom,
            $this->contactCel,
            $this->contactMail,
            $this->username,
            $this->password,
            $this->role
        ]);
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
        list(
            $this->id,
            $this->nom,
            $this->prenom,
            $this->contactCel,
            $this->contactMail,
            $this->username,
            $this->password,
            $this->role
            ) = unserialize($serialized, ['allowed_classes' => false]);
    }

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
        if ($this->getRole()->getName() == 'ROLE_ADMIN'){
            return ['ROLE_ADMIN'];
        }
        return ['ROLE_USER'];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocumentOwner(): Collection
    {
        return $this->documentOwner;
    }

    public function addDocumentOwner(Document $documentOwner): self
    {
        if (!$this->documentOwner->contains($documentOwner)) {
            $this->documentOwner[] = $documentOwner;
            $documentOwner->setCreatedBy($this);
        }

        return $this;
    }

    public function removeDocumentOwner(Document $documentOwner): self
    {
        if ($this->documentOwner->contains($documentOwner)) {
            $this->documentOwner->removeElement($documentOwner);
            // set the owning side to null (unless already changed)
            if ($documentOwner->getCreatedBy() === $this) {
                $documentOwner->setCreatedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocumentUpdater(): Collection
    {
        return $this->documentUpdater;
    }

    public function addDocumentUpdater(Document $documentUpdater): self
    {
        if (!$this->documentUpdater->contains($documentUpdater)) {
            $this->documentUpdater[] = $documentUpdater;
            $documentUpdater->setUpdatedBy($this);
        }

        return $this;
    }

    public function removeDocumentUpdater(Document $documentUpdater): self
    {
        if ($this->documentUpdater->contains($documentUpdater)) {
            $this->documentUpdater->removeElement($documentUpdater);
            // set the owning side to null (unless already changed)
            if ($documentUpdater->getUpdatedBy() === $this) {
                $documentUpdater->setUpdatedBy(null);
            }
        }

        return $this;
    }

}
