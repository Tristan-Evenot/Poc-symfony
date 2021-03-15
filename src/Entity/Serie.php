<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SerieRepository::class)
 */
class Serie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
    private $resume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vignette;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateSortie;

    /**
     * @ORM\Column(type="integer")
     */
    private $episodeActuel;

    /**
     * @ORM\Column(type="integer")
     */
    private $saisonActuelle;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $terminee;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class)
     */
    private $utilisateurId;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class)
     */
    private $categorieId;

    public function __construct()
    {
        $this->utilisateurId = new ArrayCollection();
        $this->categorieId = new ArrayCollection();
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

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getVignette(): ?string
    {
        return $this->vignette;
    }

    public function setVignette(string $vignette): self
    {
        $this->vignette = $vignette;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getEpisodeActuel(): ?int
    {
        return $this->episodeActuel;
    }

    public function setEpisodeActuel(int $episodeActuel): self
    {
        $this->episodeActuel = $episodeActuel;

        return $this;
    }

    public function getSaisonActuelle(): ?int
    {
        return $this->saisonActuelle;
    }

    public function setSaisonActuelle(int $saisonActuelle): self
    {
        $this->saisonActuelle = $saisonActuelle;

        return $this;
    }

    public function getTerminee(): ?string
    {
        return $this->terminee;
    }

    public function setTerminee(string $terminee): self
    {
        $this->terminee = $terminee;

        return $this;
    }

    /**
     * @return Collection|utilisateur[]
     */
    public function getUtilisateurId(): Collection
    {
        return $this->utilisateurId;
    }

    public function addUtilisateurId(Utilisateur $utilisateurId): self
    {
        if (!$this->utilisateurId->contains($utilisateurId)) {
            $this->utilisateurId[] = $utilisateurId;
        }

        return $this;
    }

    public function removeUtilisateurId(Utilisateur $utilisateurId): self
    {
        $this->utilisateurId->removeElement($utilisateurId);

        return $this;
    }

    /**
     * @return Collection|categorie[]
     */
    public function getCategorieId(): Collection
    {
        return $this->categorieId;
    }

    public function addCategorieId(Categorie $categorieId): self
    {
        if (!$this->categorieId->contains($categorieId)) {
            $this->categorieId[] = $categorieId;
        }

        return $this;
    }

    public function removeCategorieId(Categorie $categorieId): self
    {
        $this->categorieId->removeElement($categorieId);

        return $this;
    }
}
