<?php

namespace Sthom\App\Model;

class project
{
const TABLE="project";

    private ?int $id = null;
    private ?\DateTimeImmutable $startDate = null;
    private ?\DateTimeImmutable $endDate = null;
    private string $name;
    private ?string $description = null;
    private int $idManager;
    private int $idState;
    private int $idClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeImmutable $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getIdManager(): int
    {
        return $this->idManager;
    }

    public function setIdManager(int $idManager): void
    {
        $this->idManager = $idManager;
    }

    public function getIdState(): int
    {
        return $this->idState;
    }

    public function setIdState(int $idState): void
    {
        $this->idState = $idState;
    }

    public function getIdClient(): int
    {
        return $this->idClient;
    }

    public function setIdClient(int $idClient): void
    {
        $this->idClient = $idClient;
    }
}
