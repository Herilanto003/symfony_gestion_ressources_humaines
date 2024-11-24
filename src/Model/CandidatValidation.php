<?php

namespace App\Model;

class CandidatValidation {
  public ?string $imatricule = null;
  public ?string $grade = null;
  public ?string $service = null;
  public ?string $ministere = null;
  public ?string $direction = null;

      // Getter et Setter pour imatricule
  public function getImatricule(): ?string
  {
      return $this->imatricule;
  }

  public function setImatricule(?string $imatricule): self
  {
      $this->imatricule = $imatricule;
      return $this;
  }

  // Getter et Setter pour grade
  public function getGrade(): ?string
  {
      return $this->grade;
  }

  public function setGrade(?string $grade): self
  {
      $this->grade = $grade;
      return $this;
  }

  // Getter et Setter pour service
  public function getService(): ?string
  {
      return $this->service;
  }

  public function setService(?string $service): self
  {
      $this->service = $service;
      return $this;
  }

  // Getter et Setter pour ministere
  public function getMinistere(): ?string
  {
      return $this->ministere;
  }

  public function setMinistere(?string $ministere): self
  {
      $this->ministere = $ministere;
      return $this;
  }

  // Getter et Setter pour direction
  public function getDirection(): ?string
  {
      return $this->direction;
  }

  public function setDirection(?string $direction): self
  {
      $this->direction = $direction;
      return $this;
  }
}