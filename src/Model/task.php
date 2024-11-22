<?php

namespace Sthom\App\Model;

class task
{
    private ?int $id = null;
    private string $name;
    private ?string $description = null;
    private ?\DateTimeImmutable $startDate = null;
    private ?\DateTimeImmutable $endDate = null;
    private ?int $effort = null;
    private int $idDev;
    private int $idProject;
    private int $idState;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
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

    public function getEffort(): ?int
    {
        return $this->effort;
    }

    public function setEffort(?int $effort): void
    {
        $this->effort = $effort;
    }

    public function getIdDev(): int
    {
        return $this->idDev;
    }

    public function setIdDev(int $idDev): void
    {
        $this->idDev = $idDev;
    }

    public function getIdProject(): int
    {
        return $this->idProject;
    }

    public function setIdProject(int $idProject): void
    {
        $this->idProject = $idProject;
    }

    public function getIdState(): int
    {
        return $this->idState;
    }

    public function setIdState(int $idState): void
    {
        $this->idState = $idState;
    }
}
