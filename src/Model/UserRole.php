<?php

namespace App\Model;

class UserRole {
  private ?string $role = null;

  public function getRole(): ?string {
    return $this->role;
  }

  public function setRole(?string $role) {
    $this->role = $role;
  }
}