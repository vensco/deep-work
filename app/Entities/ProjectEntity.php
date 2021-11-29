<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ProjectEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ["created_at", "updated_at", "dateline"];
    protected $casts   = [];
}
