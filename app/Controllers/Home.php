<?php

namespace App\Controllers;
use App\Models\St;
use App\Models\Users;

class Home extends BaseController
{

     public function __construct()
    {
        $session = session();
        if (!$session->get('loggedIn')) {
            return redirect()->to('/home/login');
        }
    }

    public function index()
    {
        $data['sts']=$this->list();
        
        return view('list',$data);
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

   
    public function list(){
        $stmodel = new St();
        $builder = $stmodel->builder();
        
        $columns = ['id', 'stid', 'stname', 'stclass'];
        try {
            $searchString = $this->request->get('search');
        } catch (\Throwable $th) {
            $searchString = "";
        }

        // Check if the search string is not empty
        if (!empty($searchString)) {
            foreach ($columns as $column) {
                $builder->orLike($column, $searchString);
            }
        }elseif($searchString === '') {
            return $stmodel->findAll();

        } else {
            // Handle the case when no search string is provided
            return []; // Return an empty array if the search string is empty
        }
        
        // Fetch and return the results as an array
        $data = $builder->get()->getResultArray(); // Use getResultArray() for array results
    
        return $this->response->setJSON($results);
    }
    
    

    public function add(){
        $data['edit'] = [
            'id' => '',
            'stid'   => '',  // Empty string for 'stid'
            'stname' => '',  // Empty string for 'stname'
            'stclass' => '',  // Empty string for 'stname'
        ];
        return view('index',$data);
    }    


    public function add_user(){
        $stmodel = new St();
        
        $data['login']=$stmodel->findAll();
        return view('login',$data);
    }

    public function register(){
        return view('create',);
    }
    public function login()
{
    $usermodel = new Users();
    $session = session();

    $id = $this->request->getPost('username');
    $pass = $usermodel->where('username', $id)->first(); // Fetch the first matching user
 // Check what is being returned
    
    if ($pass && $pass['pass'] === $this->request->getPost('pass')) {
        $session->set('loggedIn', true);
        $session->set('username', $id);
        return redirect()->to('/home/index')->with('success', "Login Successfully");
    } else {
        $session->setFlashdata('error', 'Invalid credentials');

        return redirect()->back()->withInput();
    }
}
    public function tt(){
        $stmodel=new Users();
        $id=$this->request->getPost('id');
        $listdata=array(
            'id' => $this->request->getPost('id'),
            'username' => $this->request->getPost('username'),
            'email'=>$this->request->getPost('email'),
            'pass' => $this->request->getPost('pass'),
            
        );

        if($id){
            $stmodel->update($id,$listdata);
            // return redirect()->to('/home/index')->with('success',"user successfully updatet");
        }

        else{
            $stmodel->insert($listdata);
            return redirect()->to('/')->with('success',"user successfully added");
        }

        

    }

    public function store(){
        $stmodel = new St();
        $id=$this->request->getPost('id');
        $listdata=array(
            'stid' => $this->request->getPost('stid'),
            'stname' => $this->request->getPost('stname'),
            'stclass' => $this->request->getPost('stclass'),
            
        );

        if($id){
            $stmodel->update($id,$listdata);
            return redirect()->to('/')->with('success',"student successfully updatet");
            

        }
        else{
            $stmodel->insert($listdata);
            return redirect()->to('/')->with('success',"student successfully added");
        }






    }



    public function edit($id){

        $stmodel= new St();

        $data['edit']= $stmodel->find($id);

        return view('index',$data);

    }
    


    public function dalet($id){
        $stmodel = new St();
        $stmodel->delete($id);
        return redirect()->to('/')->with('success',"student successfully deleted");
    }
}
