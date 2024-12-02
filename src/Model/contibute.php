<?php

namespace Sthom\App\Model;

class contribute
{
const TABLE="contribute";

    private int $idDev;
    private int $idProject;

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
}
