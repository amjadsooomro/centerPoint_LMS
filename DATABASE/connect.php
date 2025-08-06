    <?php
    class Database {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbname = 'centerdb';
        private $conn;

        // Constructor
        public function __construct() {
            $this->connect();
        }

        // Create MySQLi connection
        private function connect() {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

            // Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        // Get the MySQLi connection
        public function getConnection() {
            return $this->conn;
        }

        // Optional: Close connection
        public function close() {
            if ($this->conn) {
                $this->conn->close();
            }
        }
    }
    ?>
