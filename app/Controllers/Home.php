<?php

namespace App\Controllers;
use App\Models\St;

class Home extends BaseController
{
    public function index()
    {
        $stmodel = new St();
        $data['sts']=$stmodel->findAll();
        return view('list',$data);
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
