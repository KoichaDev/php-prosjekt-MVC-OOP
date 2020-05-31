<?php 
    /**
     * PDO Database Class
     * Connect to the Database
     * CRUD prepared Statements
     * Bind Values
     * Return Rows and results
     */
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbName = DB_NAME;

        // Use this properties for prepare statement
        private $dbn;
        private $stmt;
        private $error;

        public function __construct() {
            // Set DSN
            $dsn = 'mysql:hosts=' . $this -> host . ';dbname=' . $this ->dbName;
            $options = array(
                PDO::ATTR_PERSISTENT => true, // Will increase the performance to check the connection is always established on the database
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // An elegant way to handle error
            );

            // Create PDO instance
            try {
                $this -> dbh = new PDO($dsn, $this -> user, $this -> pass, $options);
            } catch(PDOException $err) {
                $this -> error = $err -> getMessage();
                echo $this -> error;
            }
        }

        // Prepare Statements with query
        public function query($sql) {
            $this -> stmt = $this -> dbh -> prepare($sql);
        }

        // Bind values wit prepared statement 
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        } 

        // Execute the prepared statement
        public function execute() {
            return $this -> stmt -> execute();
        }

        // Get result set as array of objects
        public function resultSet() {
            $this -> execute();
            // return as an object, not associative array
            return $this -> stmt -> fetchAll(PDO::FETCH_OBJ);
        }

        // Fetching a single record as object
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
         }

        // Get total row count
        public function rowCount() {
            return $this-> stmt -> rowCount();
        }

        public function getLastId() {
            return $this -> dbh -> lastInsertId();
        }
    }
?>