<?php

class User
{
    protected $table = 'users';
    // create connection
    public function __construct ()
    {
        try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=db-native-mvc', "root", "");
            // set error mode
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'oops : ';
            echo '<br>';
            
            echo $e->getMessage();
            return;
        }
    }
    public function all ()
    {
        $result = [];
        $query = $this->dbh->query("SELECT * FROM {$this->table}");

        while( $row = $query->fetch(PDO::FETCH_OBJ) )
            $result[] = $row;

        return $result;
    }
    public function byId ($id)
    {
        $result = [];
        $query = $this->dbh->query("SELECT * FROM {$this->table} where id = {$id}");

        while( $row = $query->fetch(PDO::FETCH_OBJ) )
            $result[] = $row;

        return $result[0];
    }
    // insert new data
    public function insert ($params = [])
    {
        try {
            // prepare query statement
            $stmt = $this->dbh->prepare("INSERT INTO {$this->table} VALUES (:id, :name, :gender)");
            // bind and execute statement
            $stmt->execute([
                ':id' => NULL,
                ':name' => $params['name'],
                ':gender' => $params['gender']
            ]);
        } catch (PDOException $e) {
            throw $e;            
            return;
        }

        // if success return 1
        return $stmt->rowCount();
    }
    // update by id
    public function updateById ($id, $params = [])
    {
        try {
            $stmt = $this->dbh->prepare("UPDATE {$this->table} SET name = :name, gender = :gender where id = {$id}");
            $stmt->execute([
                ':name' => $params['name'],
                ':gender' => $params['gender']
            ]);
        } catch (PDOException $e) {
            throw $e;            
            return;
        }

        // if success return 1
        // return $stmt->rowCount();
        return 1;
    }
    // delete by id
    public function deleteById ($id)
    {
        try {
            $stmt = $this->dbh->prepare("DELETE FROM {$this->table} where id = {$id}");
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;            
            return;
        }

        // if success return 1
        return $stmt->rowCount();
    }
}
