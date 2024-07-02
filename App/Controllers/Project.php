<?php 

namespace App\Controllers;

use App\Model\ModelProject;
use App\Model\ModelCustomer;
use Core\BaseController;

class Project extends BaseController{
    public function Index() {
        $ModelProject = new ModelProject();
        $data['projects'] = $ModelProject -> getProjects();

        $data['navbar'] = $this -> view -> load('static/navbar');
        $data['sidebar'] = $this -> view -> load('static/sidebar');
        echo $this -> view -> load('project/index', compact('data'));
    }

    public function add() {

        $ModelCustomer = new ModelCustomer();
        $data['customers'] = $ModelCustomer -> getCustomers();

        $data['navbar'] = $this -> view -> load('static/navbar');
        $data['sidebar'] = $this -> view -> load('static/sidebar');
        echo $this -> view -> load('project/add', compact('data'));
    }

    public function edit($id) {
        $ModelCustomer = new ModelCustomer();
        $data['customers'] = $ModelCustomer -> getCustomers();

        $ModelProject = new ModelProject();
        $data['project'] = $ModelProject -> getProject($id);

        $data['navbar'] = $this -> view -> load('static/navbar');
        $data['sidebar'] = $this -> view -> load('static/sidebar');
        echo $this -> view -> load('project/edit', compact('data'));
    }

    public function CreateProject(){

        $data = $this->request->post();

        if (!$data['title']) {
            $status = 'error';
            $title = 'Ops';
            $msg = 'Lütfen proje adını giriniz.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg
            ]);
            exit();   
        }

        $ModelProject = new ModelProject();
        $insert = $ModelProject -> createProject($data);

        if ($insert) {
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'İşlem başarıyla tamamlandı.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg,
                'redirect' => _link('project')
            ]);
            exit();
        } else {
            $status = 'error';
            $title = 'Ops';
            $msg = 'E-Posta adresiniz veya şifreniz hatalı.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg
            ]);
            exit();
        }
    }

    public function EditProject(){

        $data = $this->request->post();

        if (!$data['id']) {
            $status = 'error';
            $title = 'Ops';
            $msg = 'Proje bilgisine ulaşamadık. Lütfen sayfayı yenileyiniz.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg
            ]);
            exit();   
        }
        
        if (!$data['title']) {
            $status = 'error';
            $title = 'Ops';
            $msg = 'Lütfen proje adını giriniz.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg
            ]);
            exit();   
        }

        $ModelProject = new ModelProject();
        $insert = $ModelProject -> editProject($data);

        if ($insert) {
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'İşlem başarıyla tamamlandı.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg,
                'redirect' => _link('project')
            ]);
            exit();
        } else {
            $status = 'error';
            $title = 'Ops';
            $msg = 'E-Posta adresiniz veya şifreniz hatalı.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg
            ]);
            exit();
        }
    }

    public function RemoveProject(){

        $data = $this->request->post();

        if (!$data['project_id']) {
            $status = 'error';
            $title = 'Ops';
            $msg = 'Proje bilgisine ulaşamadık. Lütfen sayfayı yenileyiniz.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg
            ]);
            exit();   
        }

        $remove = $this -> db -> remove("DELETE FROM projects WHERE projects.id = '{$data['project_id']}'"); 

        if ($remove) {
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'Proje başarıyla silindi.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg,
                'remove' => $data['project_id']
                // 'redirect' => _link('customer')
            ]);
            exit();
        } else {
            $status = 'error';
            $title = 'Ops';
            $msg = 'Proje silinemedi.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg
            ]);
            exit();
        }
    }
}

?>