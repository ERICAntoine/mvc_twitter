<?php

Class pseudo extends Data{
    private $sql;
    private $pseudo;
    private $pseudo_pass;
    
    public function main(){
        if(isset($_POST['log-in'])){
            $this->donnee();
            $this->login();
        }
        elseif(isset($_POST['register'])){ 
            $this->register();
        }
    }
    
    public function donnee(){
        $this->pseudo = $_POST['pseudo'];
        $lastname = ['po'];
        $this->pseudo_pass = hash("ripemd160", $_POST['pass'] . "si tu aimes la wac tape dans tes mains");
    }
    
    public function login() {
        if ($_POST['pseudo'] != '' && $_POST['pass']) {
            
            $pseudo_pass = hash("ripemd160", $_POST['pass'] . "si tu aimes la wac tape dans tes mains");
            
            // var_dump($hashPass);
            
            $vPDO = Data::PDO();
            $sql = 'SELECT * FROM users WHERE pseudo="'.$_POST['pseudo'].'"';
            
            $req = $vPDO->query($sql);
            $data = $req->fetch();
            
            if ($data['pswrd'] == $pseudo_pass) {
                // var_dump($data['confirmed']);
                if ($data['token'] == '1'){
                    echo 'CORRECT';
                    $_SESSION['pseudo'] = $data['pseudo'];
                    $_SESSION['lastname'] = $data['last_name'];
                    $_SESSION['firstname'] = $data['first_name'];
                    $_SESSION['birthday'] = $data['birth_date'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['theme'] = $data['id_theme'];
                    $_SESSION['avatar'] = $data['img_profile'];

                    header("Refresh:0;url=?c=home");
                } 
                else {
                    echo 'YOUR ACCOUNT HAS NOT BEEN CONFIRMED, PLEASE CONFIRMED IT BEFORE LOG-IN';
                }
            } else {
                echo 'BRRUUUUUUH';
                // var_dump($_SESSION);
            }
        }
    }
        
        public function register(){
            
            $pseudo = $_POST['pseudo'];

            $birth_date = $_POST['birthday'];


            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $theme = $_POST['theme'];
            $password = $_POST['pass'];
            $passwordConfirm = $_POST['passConfirm'];



            $b = strval($birth_date);
            if($pseudo=='') {
                echo"<script>alert('Veuillez rentrer un pseudo')</script>";  
                exit();
            } 
            if($email==''){  
                echo"<script>alert('Please enter the email')</script>";  
                exit();  
            } 
            
            if($firstname ==''){
                echo"<script>alert('Veuillez rentrer un First name')</script>";  
                exit();
            }
            if($lastname ==''){
                echo"<script>alert('Veuillez rentrer un Last name')</script>";  
                exit();
            }
            if($birth_date ==''){
                echo"<script>alert('Veuillez rentrer une date')</script>";  
                exit();
            }
            
            if($password==''){
                echo"<script>alert('Please enter the password')</script>";  
                exit();  
            }  
            
            
            if ($password == $passwordConfirm) {
                $vPDO = Data::PDO();
                
                $sql = "SELECT users.email from users where users.email='$email'";
                $req = $vPDO->query($sql);
                $data2 = $req->fetch();
                
                if ($data2['email'] == $email){
                    echo "<p>This email is already registred</p>";
                }
                
                $sql = "SELECT users.pseudo from users where users.pseudo='$pseudo'";
                $req = $vPDO->query($sql);
                $data1 = $req->fetch();
                
                if ($data1['pseudo'] == $pseudo){
                    echo "<p>This pseudo is already taken</p>";
                }
                
                else {
                    echo "okokokokokokok";
                    $hashpass = hash("ripemd160", $password . "si tu aimes la wac tape dans tes mains");
                    $vPDO = Data::PDO();
                    $sql = 'INSERT INTO users(pseudo, first_name, last_name, birth_date, email, pswrd, id_theme) VALUES(:pseudo, :first_name, :last_name, :birth_date, :email, :pswrd, :id_theme)';
                    $req = $vPDO->prepare($sql);
                    $result = $req->execute([
                        'pseudo' => $pseudo,
                        'first_name' => $firstname,
                        'last_name' => $lastname,
                        'birth_date' => $b,
                        'email' => $email,
                        'pswrd' => $hashpass,
                        'id_theme' => $theme
                        ]);                    
                        include_once 'mailer.php';                    
                        
                        if($result == true){
                            echo "<p>Welcome, you have been registred</p>"; 
                        }
                        elseif($result == false){
                            echo "<p>You're registration failed</p>";
                        }
                    }
                }
            }
        }
        $log = new pseudo();
        $log->main();
        
        ?>