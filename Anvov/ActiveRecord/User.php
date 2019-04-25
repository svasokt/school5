<?php

class User
{
    /**
     * Save
     *
     * @param $name
     * @param $email
     * @param $password
     * @return mixed
     */
    public static function register($name, $email, $password)
    {
        $db = DB::getConnection();

        $sql = 'INSERT INTO user (name, email, password)'
               .'VALUES (:name, :email, :password)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * @param $name
     * @return bool
     */
    public static function checkName($name)
    {
        if(strlen($name) >=2)
        {
            return true;
        }
    }

    /**
     * @param $email
     * @return bool
     */
    public static function checkEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
    }

    /**
     * @param $password
     * @return bool
     */
    public static function checkPassword($password)
    {
        if(strlen($password) >=6)
        {
            return true;
        }
    }

    /**
     * @param $phone
     * @return bool
     */
    public static function checkPhone($phone)
    {
        if(strlen($phone) >= 9)
        {
            return true;
        }
    }

    /**
     * @param $email
     * @return bool
     */
    public static function checkEmailExists($email)
    {
        $db = DB::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
        {
            return true;
        }else
            {
                return false;
            }
    }

    /**
     * Read
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public static function checkUserData($email,$password)
    {
        $db = DB::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if($user)
        {
            return $user['id'];
        }else
        {
            return false;
        }
    }

    /**
     * READ
     *
     * @param $userId
     * @return mixed
     */
    public static function getUserById($userId)
    {
        $db = DB::getConnection();

        $sql = 'SELECT * FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $userId, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    /**
     * Update
     *
     * @param $userId
     * @param $name
     * @param $password
     * @return mixed
     */
    public static function edit($userId,$name,$password)
    {
        $db = DB::getConnection();

        $sql = 'UPDATE user SET name = :name, password = :password WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':id', $userId, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * DELETE
     *
     * @param $userId
     */
    public static function deleteUser($userId)
    {
        $id = intval($userId);
        if ($id) {
            $db = DB::getConnection();
            $sql = 'DELETE FROM user WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $userId, PDO::PARAM_INT);
            $result->execute();
        }
    }
}

?>