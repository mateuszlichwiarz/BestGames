<?php


class UserManager {

    protected $login;
    protected $password;
    protected $email;
    protected $id;

    public function LogIn($LOGIN, $PASSWORD)
    {
        $this->login    = $LOGIN;
        $this->password = $PASSWORD;

        if(self::isExist() && count(self::isExist()) > 0) {
            $id = self::getIdByUsername();
            $this->id = $id;

            self::log_in();
            return $this->login;

        } else {
            return false;
        } 
    }


    protected function isExist()
    {
        $arr = DatabaseManager::selectBySQL("SELECT * FROM users WHERE username='".$this->login."' AND password='".md5($this->password)."' LIMIT 1");
        return $arr;
    }

    protected function getIdByUsername()
    {
        $array = DatabaseManager::selectBySQL("SELECT * FROM users WHERE username='".$this->login."' AND password='".md5($this->password)."' LIMIT 1");
        foreach($array as $key) {
            $id = $key['id'];
        }
        return $id;
    }

    protected function log_in()
    {
        $_SESSION['uid']    = $this->id;
        $_SESSION['logged'] = true; 
    }

    public function log_out()
    {
        $_SESSION['uid'] = false;
        $_SESSION['logged'] = false;

        session_destroy();
    }

    public function CreateUser($POST)
    {
        if(isset($POST) && is_array($POST)) {
            $select = DatabaseManager::selectBySQL("SELECT username FROM users WHERE username='{$POST['username']}'");
            if($select == false){
            $res = DatabaseManager::insertInto("users", array("username"=>addslashes($POST['username']),
                                                              "password"=>md5($POST['password']), 
                                                              "email"   =>addslashes($POST['email'])));
            }else{
                return false;
            }

        if($res) {
            return true;
        } else {
            return false;
        }

        } else {
            return false;
        }
    }

    public function UpdateUser($data,$column,$value)
    {
        if(isset($data)) {
            
            if($column == 'username' || $column == 'email'){
                $res = DatabaseManager::updateTable("users", array($column => $value), array('id' => $_SESSION['uid'],
                                                                                            $column => $data));
            }else{
                $res = DatabaseManager::updateTable("personals", array($column => $value), array('id' => $_SESSION['uid'],
                                                                                            $column => $data));
            }

            if($res)
            {
                return true;
            }else{
                return false;
            }
        } else{
            return false;
        }
    }

    public function insertUser($POST)
    {
       if(isset($POST) && is_array($POST)) {

            $res = DatabaseManager::insertInto("personals", array("id"=>$_SESSION['uid'],
                                                "forename"=>addslashes($POST['forename']),
                                                "surname" =>addslashes($POST['surname']), 
                                                "zipcode" =>addslashes($POST['zipcode']),
                                                "city"    =>addslashes($POST['city']),
                                                "street"  =>addslashes($POST['street']),
                                                "phone"   =>addslashes($POST['phone'])));
        

        if($res) {
            return true;
        } else {
            return false;
        }

        }else{
            return false;
        }
    }

    public function ViewUser($id)
    {
        $select  = DatabaseManager::selectBySQL("SELECT * FROM users WHERE id='{$id}'");
        if($select == true){
            foreach($select as $arr){
                $data = $arr;
                
                echo '
                            <ul>
                                <li>Nazwa użytkownika: '.$data['username'].'</li>
                                <li>E-mail: '.$data['email'].'</li>';

                $select2 = DatabaseManager::selectBySQL("SELECT * FROM personals WHERE id='{$id}'");
                if($select2 == true){
                    foreach($select2 as $arr2){
                        $data2 = $arr2;
                        
                        echo '
                                <li>Numer telefonu: '.$data2['phone'].'</li>
                                <li>Imię: '.$data2['forename'].'</li>
                                <li>Nazwisko: '.$data2['surname'].'</li>
                                <li>Miejscowość: '.$data2['city'].'</li>
                                <li>Kod pocztowy: '.$data2['zipcode'].'</li>
                                <li>Ulica: '.$data2['street'].'</li>
                        
                        ';
                        
                    }
                }
                if($data['admin'] == 1){
                    echo '<li>Admin: tak</li>';
                }else{
                    echo '<li>Admin: nie</li>';
                }
                
                echo '</ul>';
            }
        }else{
            echo "<h3>Wystąpił błąd.</h3>";
        }
    }

    public function UsersList()
    {
        $select  = DatabaseManager::selectBySQL("SELECT * FROM users ORDER BY id ASC");
        if($select == true){
            foreach($select as $arr){
                $data = $arr;

                echo '<tr>
                <td>
                    '.$data['id'].'
                </td>
                <td>
                    <form action="viewuser" method="POST">
                        <input type="hidden" id="id" name="id" value="'.$data['id'].'"/>
                        <input type="hidden" id="name" name="name" value="'.$data['username'].'" />

                        <input type="submit" value="'.$data['username'].'"/>
                    </form>
                </td>
                </tr>
                ';
            }
        }
    }

}