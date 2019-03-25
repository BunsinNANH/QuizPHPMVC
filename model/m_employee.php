<?php 
    // Model view data
    function m_get_data(){
        $query = " select * from employee";
        include 'connection.php';
        $result = mysqli_query($conn , $query);

        $rows = [];

        if($result && mysqli_num_rows($result) > 0){
            while ($get_result_to_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $rows[] = $get_result_to_array;
            }
        }
        return $rows;
    }

    // Model add Data
    function add_employee(){
        
        include "connection.php";
        if(isset($_POST['btn-add'])){

            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $title = $_POST['title'];
            $age = $_POST['age'];
            $yearOfServices = $_POST['yearofservice'];
            $salary = $_POST['salary'];
            $perks = $_POST['perks'];
            $email = $_POST['email'];
            $department = $_POST['departmentid'];
            
            $sql =" INSERT INTO employee WHERE (firstname,lastname,title,age,yearofservice,salary,perks,email,departmentid) 
            VALUES('$firstName','$lastName','$title','$age','$yearOfServices','$salary','$perks','$email','$departmentid')";
    
        $result = mysqli_query($conn,$sql);
    
        return $result;
    
    }
}
// Model delete Data
    function m_delete_employee(){
        include 'connection.php';
        $id = $_GET['id'];
        $query = " DELETE  From employee WHERE id='$id'";

        $result = mysqli_query($conn,$query);

        return $result;
    }

    // View detail for update
    function m_employee_detail(){
        include 'connection.php';
        $id = $_GET['id'];
        $query = " SELECT * FROM employee WHERE id='$id'";

        $result = mysqli_query($conn,$query);
        return $result;
    }

    // Update employee
    function m_update_employee(){
        include_once 'connection.php';

        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $title = $_POST['title'];
        $age = $_POST['age'];
        $yearOfServices = $_POST['yearofservice'];
        $salary = $_POST['salary'];
        $perks = $_POST['perks'];
        $email = $_POST['email'];
        $department = $_POST['departmentid'];

        $query = "UPDATE employee SET firstname = '$firstName',lastname='$lastName',title='$title',
        age='$age',yearofservice='$yearOfServices',salary='$salary',perks='$perks',email='$email',departmentid='$department'
        WHERE id='$id'";

        $result = mysqli_query($conn,$query);

        return $result;
    }
   
    function validateForm(){
        include 'connection.php';

        if(isset($_POST['but_submit'])){

            $uname = mysqli_real_escape_string($conn,$_POST['txt_uname']);
            $password = mysqli_real_escape_string($conn,$_POST['txt_pwd']);
        
            if ($uname != "" && $password != ""){
        
                $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
                $result = mysqli_query($conn,$sql_query);
                $row = mysqli_fetch_array($result);
        
                $count = $row['cntUser'];
        
                if($count > 0){
                    $_SESSION['uname'] = $uname;
                    header('Location: index.php?action=view');
                }else{
                    echo "Invalid username and password";
                }
            }
        }
    }
    function validateRegister(){
        include 'connection.php';

        if(isset($_POST['btn-register'])){

            $username = $_POST['username'];
            $fullname = $_POST['name'];
            $password = $_POST['pwd'];
        
            $sql_query = "Insert into users(username,name,password) values('$username','$fullname','$password')";
            $result = mysqli_query($conn,$sql_query);

            return $result;
        }
    }
    function formAddUser(){
        include 'connection.php';

        if(isset($_POST['btn-save'])){

            $username = $_POST['username'];
            $fullname = $_POST['name'];
            $password = md5($_POST['pwd']);
        
            $sql_query = "Insert into users(username,name,password) values('$username','$fullname','$password')";
            $result = mysqli_query($conn,$sql_query);

            return $result;
        }
    }

    function m_get_user(){
        $query = " select * from users";
        include 'connection.php';
        $result = mysqli_query($conn , $query);

        $rows = [];

        if($result && mysqli_num_rows($result) > 0){
            while ($get_result_to_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $rows[] = $get_result_to_array;
            }
        }
        return $rows;
    }
?>