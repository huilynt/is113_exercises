<?php

class UserDAO
{

    function get($username)
    {
        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // prepare select
        $sql = "SELECT 
                    username, 
                    password_hash,
                    firstname,
                    lastname  
                FROM useraccount 
                WHERE 
                    username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);

        $user = null;
        if ($stmt->execute()) {

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $user = new User($row["username"], $row["password_hash"], $row["firstname"], $row["lastname"]);
            }
        } else {
            $connMgr->handleError($stmt, $sql);
        }

        // close connections
        $stmt = null;
        $conn = null;

        return $user;
    }

    public function add($username, $passwordHash, $firstname, $lastname)
    {
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // prepare select
        $sql = "INSERT INTO
                    useraccount
                    (
                    username, 
                    password_hash,
                    firstname,
                    lastname  
                    )
                VALUES
                    (
                    :username, 
                    :password_hash,
                    :firstname,
                    :lastname  
                    )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":password_hash", $passwordHash, PDO::PARAM_STR);
        $stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);

        $isAddOK = $stmt->execute();
        return $isAddOK;
    }
}
