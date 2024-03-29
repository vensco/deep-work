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

        if (!$this->validate("createProject")) {
            return redirect()->to("/projects")->with("error_validation", true)->withInput();
        }

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

    public function edit(int $id)
    {
        $project = $this->projectModel->find($id);
        
        if (empty($project)) {
            throw new Exception("project not found", 404);
        }

        return json_encode($project);
    }

    public function update(int $id)
    {
        $inputs = esc($this->request->getPost());

        if (! $this->validate("updateProject")) {
            return redirect()->to("/projects")->with("error_validation", true)->withInput();
        }

        $project = $this->projectModel->find($id);

        if (empty($project)) {
            throw new Exception("project not found", 404);
        }

        $project->name = $inputs["name"];
        $project->description = $inputs["description"];
        $project->dateline = $inputs["dateline"];

        try {
            $this->projectModel->save($project);
        } catch(Exception $e) {
            return redirect()->to("/projects")->with("error_update", $e->getMessage());
        }

        return redirect()->to("/projects")->with("success_message", "project updated");
    }

    public function delete(int $id)
    {
        if ($this->projectModel->delete($id)) {
            return redirect()->to("/projects")->with("success_message", "project deleted");
        }
    }
}
