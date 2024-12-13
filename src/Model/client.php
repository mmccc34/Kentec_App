<?php

namespace Sthom\App\Model;

class client
{
const TABLE="client";

    private ?int $id = null;
    private string $siren;
    private ?string $name = null;
    private ?string $naf = null;
    private ?int $staff = null;
    private ?\DateTimeImmutable $dateCreate = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getSiren(): string
    {
        return $this->siren;
    }

    public function setSiren(string $siren): void
    {
        $this->siren = $siren;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getNaf(): ?string
    {
        return $this->naf;
    }

    public function setNaf(?string $naf): void
    {
        $this->naf = $naf;
    }

    public function getStaff(): ?int
    {
        return $this->staff;
    }

    public function setStaff(?int $staff): void
    {
        $this->staff = $staff;
    }

    public function getDateCreate(): ?\DateTimeImmutable
    {
        return $this->dateCreate;
    }

    public function setDateCreate(?\DateTimeImmutable $dateCreate): void
    {
        $this->dateCreate = $dateCreate;
    }
}
