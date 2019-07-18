<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EpreuveRepository")
 * @Vich\Uploadable
 */
class Epreuve extends Document
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $titre;

    /**
     * @Vich\UploadableField(mapping="epreuves", fileNameProperty="documentName", size="documentSize", mimeType="documentMimeType", originalName="documentOriginalName")
     * @var File|null
     * @Assert\File(
     *     maxSize = "2M",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Veuillez choisir un document PDF valide",
     *     maxSizeMessage = "Fichier trop volumineux! taille acceptée: moins de 2Mo"
     *  )
     */
    protected $documentFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $documentName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $documentSize;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $documentMimeType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $documentOriginalName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDocumentName(): ?string
    {
        return $this->documentName;
    }

    public function setDocumentName($documentName): self
    {
        $this->documentName = $documentName;

        return $this;
    }

    public function getDocumentSize(): ?int
    {
        return $this->documentSize;
    }

    public function setDocumentSize(?int $documentSize): self
    {
        $this->documentSize = $documentSize;

        return $this;
    }

    public function getDocumentMimeType(): ?string
    {
        return $this->documentMimeType;
    }

    public function setDocumentMimeType($documentMimeType): self
    {
        $this->documentMimeType = $documentMimeType;

        return $this;
    }

    public function getDocumentOriginalName(): ?string
    {
        return $this->documentOriginalName;
    }

    /**
     * @return File|null
     */
    public function getDocumentFile(): ?File
    {
        return $this->documentFile;
    }

    public function setDocumentOriginalName($documentOriginalName): self
    {
        $this->documentOriginalName = $documentOriginalName;

        return $this;
    }

    /**
     * @param File|null $documentFile
     * @return Epreuve
     * @throws \Exception
     */
    public function setDocumentFile(?File $documentFile): Epreuve
    {
        $this->documentFile = $documentFile;

        // Ne modifiez la mise à jour que si le fichier est réellement téléchargé pour éviter les mises à jour de la base de données.
        // Cela est nécessaire lorsque le fichier doit être défini lors du chargement de l'entité.
        if ($this->documentFile instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
        }
        return $this;
    }

}
