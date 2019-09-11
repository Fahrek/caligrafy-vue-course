<?php

use Caligrafy\Controller;

class ProjectController extends Controller {
    
    // read all projects
    public function index()
    {
        $this->associate('Project', 'projects');
        $projects = $this->all()?? array();
        
        return api(array('projects' => $projects));
        // alternatively: return view('', array('projects' => $projects));
        
    }
    
    // read one specific project
    public function readProject()
    {
        $this->associate('Project', 'projects');
        $project = $this->find()?? null;
        if ($project) {
            return api(array('project' => $project));
        } else {
            return api(array('error' =>  true));
        }
        
    }
    
    
    // create new project
    public function addProject()
    {
        $this->associate('Project', 'projects');
        $parameters = $this->request->parameters;
        
        //validation will come in later
        
        $project = new Project();
        $project->title = $parameters['title']?? 'not entered';
        $project->category = $parameters['category']?? 'not entered';
        $project->short_description = $parameters['short_description']?? 'not entered';
        $project->description = $parameters['description']?? 'not entered';
        $project->image_url = $parameters['image_url']?? 'not entered';
        $response = $this->save($project);
        
        return api(array('project' => $response));
        
    }
    
    
    // edit existing project
    public function editProject() 
    {
        $this->associate('Project', 'projects');
        $project = $this->find()?? null;
        
        if (!$project) {
            return api(array('error' =>  true));
            exit;
        }
        
        
        $parameters = $this->request->parameters;
        
        // validation will come in later
        
        $project->title = $parameters['title']?? $project->title;
        $project->category = $parameters['category']?? $project->category;
        $project->short_description = $parameters['short_description']?? $project->short_description;
        $project->description = $parameters['description']?? $project->description;
        $project->image_url = $parameters['image_url']?? $project->image_url;
        $response = $this->save($project); 
        
        return api(array('project' => $response));
        
    }
    
    
    // delete an existing project
    public function deleteProject()
    {
        $this->associate('Project', 'projects');
        $this->delete();
        redirect('/');
    }
    
    
}