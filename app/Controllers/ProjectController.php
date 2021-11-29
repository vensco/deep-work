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
        $keyword = esc($this->request->getVar("q"));
        $projects = $this->projectModel->search($keyword);

        $data = [
            "title"         => lang("Project.title.index"),
            "keyword"       => $keyword,
            "projects"      => $projects->paginate(10, "projects"),
            "pager"         => $this->projectModel->pager->links("projects")
        ];
        
        return view("project/index", $data);
    }
}
