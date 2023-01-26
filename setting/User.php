<?php
/**
*
*/

class User extends Connection{

    const FIELDS = [
         'id',
         'cuenta',
         'nombre',
         'apellido',
         'fecha_nacimiento',
         'telefono',
         'departamento',
         'ciudad_municipio',
         'diereccion',
         'email',
         'contrasenia'
    ]; 

    protected $data = null;
    protected $account;
    protected $firtName;
    protected $lastName; 
    protected $dateBirth;
    protected $phone;
    protected $department;
    protected $cityMunicipality;
    protected $direction;
    protected $email;
    protected $password2;
    protected $sessionStart;

    public function load(string $email,string $password){
        $fields = implode(",",self::FIELDS);
        return $this->get(['email'=>"$email",'contrasenia'=>"$password"]);
    }

    public function get(array $query){
        $fields = implode(",",self::FIELDS);
        $where = [];
        foreach($query as $key => $value){
            $where[] = "$key = '$value'";
        }
        $where = implode(" and ",$where);
        
        $data = $this->consultarUsuario("SELECT $fields FROM usuarios 
                                    WHERE $where");       
      
        if($data){
            if(count($data) > 0 ){
                $this->data =  $data;
            }
        }
        return $this;
    }

    public function _getData(){
        return $this->data;
    }

    public function getData(string $field){
        if($this->data){
            if(in_array($field, $this->data)){
                return $this->data[$field];
            }
        }
        return null;
    }

    // apertura de metodos SET de class User
    
    public function setAccount($account){
        $this->account = $account;
    }

    public function setFirtName($firtName){
        $this->firtName = $firtName;
    }
    
    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function setDateBirth($dateBirth){
        $this->dateBirth = $dateBirth;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function setDepartment($department){
        $this->department = $department;
    }

    public function setCityMunicipality($cityMunicipality){
        $this->cityMunicipality = $cityMunicipality;
    }

    public function setDirection($direction){
        $this->direction = $direction;
    }

    public function setEmail($email){
        $this->data['email'] = $email;
    }

    public function setPassword($password){
        $this->data['password'] = $password;
    }

    public function setPassword2($password2){
        $this->password2 = $password2;
    }

    public function setSessionStart($sessionStart){
        $this->sessionStart = $sessionStart;
        $this->get(['email'=>$sessionStart]);
    }

    //apertura de metodos GET de class User

    public function getAccount(){
        return $this->account;
    }

    public function getFirtName(){
        return $this->firtName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getFullName(){
        return $this->data['nombre'].' '.$this->data['apellido'];
    }

    public function getDateBirth(){
        return $this->dateBirth;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getDepartment(){
        return $this->department;
    }

    public function getCityMunicipality(){
        return $this->cityMunicipality;
    }

    public function getDirection(){
        return $this->direction;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getPassword2(){
        return $this->password2;
    }

    public function getSessionStart(){
        return $this->sessionStart;
    }

    // metodo para guardar usuario en la base de datos

    public function save(){
        $account = $this->getAccount();
        $firtName = $this->getFirtName();
        $lastName = $this->getLastName(); 
        $dateBirth = $this->getDateBirth();
        $phone = $this->getPhone();
        $department = $this->getDepartment();
        $cityMunicipality = $this->getCityMunicipality();
        $direction = $this->getDirection();
        $email = $this->getEmail();
        $password = $this->getPassword();

        $field = [];
        foreach(self::FIELDS as  $value){
            $field[] = "`".$value."`";
        }

        $fields = implode(", ",$field);
        
        $sqlUsuario="INSERT INTO `usuarios` ($fields) 
                 VALUES (NULL, '$account', '$firtName','$lastName', '$dateBirth', '$phone', '$department', '$cityMunicipality', '$direction', '$email', '$password');";
        
        $this->ejecutar($sqlUsuario);

        for($i=0; $i<1; $i++){

            sleep(3);

            $newUser = $this->get(['email'=>$email]);
            $infoUser = $newUser->_getData();

            if(!empty($infoUser['contrasenia']) && !empty($infoUser['email'])){
                header("location:Success.php");
            }else{
                header("location:Failure.php");
            } 
        }   
    }   
    
    // metodo para validar un usuario en la base de datos y loguearlo

    public function validationLogin($password){
        if($this->_validationLogin($password) && $this->data['cuenta'] == "Administrador"){        
            header("location:Admin.php");
    
        }elseif($this->_validationLogin($password)){    
            header("location:Index.php");    
        }else{
            echo "<script> alert('Usuario o contraseña incorrecta')</script>";
        }
    }

    public function _validationLogin($password){
        if($infoUser = $this->data){  
            $out = (count($infoUser) > 0 && password_verify($password, $infoUser['contrasenia']));
            if($out){    
                session_start();
                $_SESSION['usuario'] = $infoUser['email'];
            }
            return $out;
        }        
        $_SESSION['usuario'] = false;
        $this->data = null;
        return false;
    }
    

    // metodo para validar si la sesion esta activa

    public function validationSessionActive(){
        $userSession = $this->getSessionStart();
        $field = implode(",",self::FIELDS);

        if(!empty($userSession)){
            $user = $this->consultarUsuario("SELECT $field FROM usuarios WHERE email='$userSession'");
            
            $this->setFirtName($user['nombre']);
            $this->setLastName($user['apellido']);
            $this->setEmail($user['email']);

            if( isset($userSession)!=$this->getEmail()){
               header("location:Login.php");
            }
        }else{
            header("location:Login.php");
        }
    }
}