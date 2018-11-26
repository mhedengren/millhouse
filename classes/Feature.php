<?php

class Feature
{
  private $pdo;

  /* Inject the pdo connection so it is available inside of the class
   * so we can call it with '$this->pdo', always available inside of the class
   */
  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function delete()
  {
    return true;
  }

  public function create($newPost)
  {
    return true;
  }
}