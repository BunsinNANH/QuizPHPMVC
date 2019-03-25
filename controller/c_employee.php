<?php 
    // flexible function pages
    $data = array();    
    flexible_function($data);
    function flexible_function(&$data){
        $function = 'login';
        if(isset($_GET['action'])){
            $action = $_GET['action'];
            $function = $action;
        }

        $function($data);
       
    } 

    // Read Data
    function view(&$data){
        $data['employee_data'] = m_get_data();
        $data['page']="employee/view";
    }
    
    // Insert 
    function addData(&$data){
        $data['page'] = 'employee/add';
    }
    function add(&$data){
       $add_data = add_employee();
       if($add_data){
           $action = 'view';
       }else{
           echo 'Cannot Insert';
       }
       header("location:index.php?action=$action");
    }

    // Update
    function edit(&$data){
        $data['employee_data'] = m_employee_detail();
        $data['page'] = 'employee/update';
    }

    function update(&$data){
        $id = $_GET['id'];
        $data = m_update_employee($_POST);
        if($data){
            $action ="view";
        }else{
            $action = "edit&id=$id";
        }
        header("location:index.php?action=$action");
    }
    // Delete
    function delete(&$data){
        $data_delete = m_delete_employee();
        
        if($data_delete){
            $action = 'view';
        }else{
            echo "Cannot Delete";
        }
        header("location:index.php?actin=$action");
    }
    
    // View Detail
    function detail(&$data){
        $data['employee_data'] = m_employee_detail();
        $data['page']="employee/detail";
    }

    function login(&$data){
        $data['page']= 'login';
    }
    function loginVaildate(&$data){
        validateForm();
    }
    function register(&$data){
        $data['page'] ='register';
    }
    function registerValidate(&$data){
        $register = validateRegister();
        if($register){
            $action = 'login';
        }else{
            echo 'Cannot Insert';
        }
        header("location:index.php?action=$action");
       
    }

    function logout(&$data){
        // logout
        if(isset($_POST['but_logout'])){
            session_destroy();
            header('Location: index.php');
        }
    }
    // action to add user
    function addUser(&$data){
        $data['page'] ='employee/userAdd';
    }
    // add user
    function addUserInfo(&$data){

        $register = formAddUser();
        if($register){
            $action = 'viewUser';
        }else{
            echo 'Cannot Insert';
        }
        header("location:index.php?action=$action");
       
    }
    function viewUser(&$data){
        $data['user_data'] = m_get_user();
        $data['page']="employee/viewUser";
    }
?>  