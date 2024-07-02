<?php 

namespace App\Controllers;

use App\Model\ModelAuth as ModelAuth;
use Core\BaseController;
use Core\Session;

class Auth extends BaseController{

    public function Index(){
        $data['form_link'] = _link('login');
        echo $this -> view -> load('auth/index', $data);
    }

    
    public function Login(){
        $data = $this -> request -> post();

        if (!$data['email']) {
            $status = 'error';
            $title = 'Ops';
            $msg = 'E-Posta Adresinizi giriniz.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg
            ]);
            exit();
            
        }

        if (!$data['password']) {
            $status = 'error';
            $title = 'Ops';
            $msg = 'Şifrenizi giriniz.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg
            ]);
            exit();
             
        }

        $authModel = new ModelAuth();
        $access = $authModel -> userLogin($data);

        
        if ($access) {
            $status = 'success';
            $title = 'İşlem Başarılı';
            $msg = 'İşlem başarıyla tamamlandı.';
            echo json_encode([
                'status' => $status,
                'title' => $title,
                'msg' => $msg,
                'redirect' => _link()
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

    
    public function Logout(){

        Session::removeSession();
        redirect('login');
    }
}

?>