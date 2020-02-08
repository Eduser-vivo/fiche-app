<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @ApiResource()
 * @ApiFilter(
 *      SearchFilter::class,    
 *      properties={
 *          "facture.id"="exact"
 *      }
 * )
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"get-facture-with-produit"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"get-facture-with-produit"})
     */
    private $designation;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"get-facture-with-produit"})
     */
    private $quantite;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"get-facture-with-produit"})
     */
    private $prixUnitaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Facture", inversedBy="produit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $facture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixUnitaire(): ?int
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(int $prixUnitaire): self
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): self
    {
        $this->facture = $facture;

        return $this;
    }
}
