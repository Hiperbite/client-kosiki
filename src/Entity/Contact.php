<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $emaila = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $emailb = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $telefonea = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $telefoneb = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $website = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $facebook = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $linkedin = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $twitter = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $youtube = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $address = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmaila(): ?string
    {
        return $this->emaila;
    }

    public function setEmaila(string $emaila): static
    {
        $this->emaila = $emaila;

        return $this;
    }

    public function getEmailb(): ?string
    {
        return $this->emailb;
    }

    public function setEmailb(string $emailb): static
    {
        $this->emailb = $emailb;

        return $this;
    }

    public function getTelefonea(): ?string
    {
        return $this->telefonea;
    }

    public function setTelefonea(string $telefonea): static
    {
        $this->telefonea = $telefonea;

        return $this;
    }

    public function getTelefoneb(): ?string
    {
        return $this->telefoneb;
    }

    public function setTelefoneb(string $telefoneb): static
    {
        $this->telefoneb = $telefoneb;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(string $facebook): static
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(string $linkedin): static
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(string $twitter): static
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(string $youtube): static
    {
        $this->youtube = $youtube;

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
}
