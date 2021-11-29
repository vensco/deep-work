<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\ProjectEntity;
use App\Models\ProjectModel;

class ProjectController extends BaseController
{
    private ProjectModel $projectModel;
    private ProjectEntity $projectEntity;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->projectEntity = new ProjectEntity();
    }

    public function index()
    {
        
    }
}
