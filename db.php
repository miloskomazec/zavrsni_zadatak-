<?php
    class DbManagement {
        private $servername = "127.0.0.1";
        private $username = "root";
        private $password = "BorkanbosanaC00";
        private $dbname = "blog";
        private $connection;

        function __construct(){
            try {
                $this->connection = new PDO("mysql:host=$this->servername; dbname=$this->dbname", $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        function getAllPostsByDescOrder(){
            $sql = "SELECT Id, Title, Body, Author, Created_at FROM posts ORDER BY Created_at DESC";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            return $statement->fetchAll();
        }

        function getPostById($id){
            $sql = "SELECT Id, Title, Body, Author, Created_at FROM posts WHERE posts.Id = $id";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            return $statement->fetch();
        }

        function getCommentsByPostId($id){
            $sql = "SELECT Author, Text FROM comments WHERE comments.Posts_id = $id";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            return $statement->fetchAll();
        }
    }
?>