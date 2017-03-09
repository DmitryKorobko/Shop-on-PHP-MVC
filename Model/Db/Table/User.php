<?php
class Model_Db_Table_User extends System_Db_Table
{
    
    protected $_name = 'user';

    /**
     * 
     * @param int $id
     * @return array
     */
    public function getById($id)
    {
        $sql = 'select * from ' . $this->getName() . ' where id = ?';
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute([$id]);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
    /**
     * @param array $params
     * @return int 
     */
    public function create($params)
    {
        $login      = trim($params['email']);
        $password   = trim($params['password']);
        $sql = 'INSERT INTO ' . $this->getName() . ' (email,password) VALUES(?,?)';
        $sth = $this->getConnection()->prepare($sql);
        $result = $sth->execute([$login, sha1($password)]);
        if($result) {
            return $this->getConnection()->lastInsertId();
        }
    }
    
    /**
     * 
     * @param array $params
     * @param int $mode
     * @return array
     */
    public function checkIfExists($params, $mode = Model_User::MODE_REGISTER)
    {
        $login      = trim($params['email']);
        $password   = trim($params['password']);
        
        $requestParams = [$login];
        $sql = 'select * from ' . $this->getName() . ' where email = ?';
        if($mode == Model_User::MODE_LOGIN) {
            $sql .= ' AND password = ?';
            array_push($requestParams, sha1($password));
        }
        
             
        /**
         * @var PDOStatement $sth 
         */
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute($requestParams);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);        
        
        return $result;
    }

    public function getAllUsers()
    {
        $sql = 'select * from ' . $this->getName();
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function deleteUser($id)
    {
        $sql = 'delete from ' . $this->getName() . ' where id = ?';
        $sth = $this->getConnection()->prepare($sql);
        $sth->execute([$id]);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * @param array $params
     * @return int
     */
    public function addingUser($params)
    {
        $login      = trim($params['email']);
        $password   = trim($params['password']);
        $first_name = trim($params['first_name']);
        $last_name  = trim($params['last_name']);
        $birth      = trim($params['birth']);
        $skills     = trim(implode(",", $params['skills']));
        $photo      = trim($params['photo']);
        $role_id    = trim($params['role_id']);
        $sql = 'INSERT INTO ' . $this->getName() . ' (email,password,first_name,last_name,birth,skills,photo,role_id) VALUES(?,?,?,?,?,?,?,?)';
        $sth = $this->getConnection()->prepare($sql);
        $result = $sth->execute([$login, sha1($password),$first_name,$last_name,$birth,$skills,$photo,$role_id]);
        if($result) {
            return $this->getConnection()->lastInsertId();
        }
    }

    /**
     * @param array $params
     * @return int
     */
    public function editingUser($params)
    {
        $login      = trim($params['email']);
        $password   = trim($params['password']);
        $first_name = trim($params['first_name']);
        $last_name  = trim($params['last_name']);
        $birth      = trim($params['birth']);
        $skills     = trim(implode(",", $params['skills']));
        $photo      = trim($params['photo']);
        $role_id    = trim($params['role_id']);
        $user_id = trim($params['user_id']);

        $sql = 'UPDATE ' . $this->getName() . ' SET 
                `email` =:login, 
                `first_name` =:first_name, 
                `last_name` =:last_name, 
                `birth` =:birth, 
                `skills` =:skills, 
                `photo` =:photo, 
                `role_id` =:role_id 
                 WHERE `id`=:user_id';
        $sth = $this->getConnection()->prepare($sql);
        $sth->bindValue(":login",$login);
        $sth->bindValue(":first_name",$first_name);
        $sth->bindValue(":last_name",$last_name);
        $sth->bindValue(":birth",$birth);
        $sth->bindValue(":skills",$skills);
        $sth->bindValue(":photo",$photo);
        $sth->bindValue(":role_id",$role_id);
        $sth->bindValue(":user_id",$user_id);
        $result = $sth->execute();
        if($result) {
            return $this->getConnection()->lastInsertId();
        }

    }
}