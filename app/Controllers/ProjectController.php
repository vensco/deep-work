<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\ProjectEntity;
use App\Models\ProjectModel;
use Exception;

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
    
    public function create()
    {
        $inputs = esc($this->request->getPost());

        $project = $this->projectEntity;
        $project->name = $inputs["name"];
        $project->description = $inputs["description"];
        $project->dateline = $inputs["dateline"];

        try {
            $this->projectModel->insert($project);
        } catch(Exception $e) {
            return redirect()->to("/projects")->with("error_message", $e->getMessage());
        }

        return redirect()->to("/projects")->with("success_message", lang("Message.success.create", ["project"]));
    }
}
