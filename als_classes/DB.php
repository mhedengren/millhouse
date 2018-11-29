<?php

// Database wrapper, abstracted way to work with db, reuseable AF
// Singleton pattern (one single link to database), instead of connecting over and over we instanciate the connection and then if called upon again check if its instanciated and if so doesnt connect again
class DB {

    // Store the instance of the db if its available or if not instanciate from within it and store here, look at getInstance method
    private static $_instance = null;

    /* 
    * The underscore is a notation for the properties being private
    * $_pdo store the instance of the pdo object
    * $_query is the last query executed i.e stores the query
    * $_error represent if theres error or not (if query fail or not)
    * $_results store the resultset
    * $_count represent the count of the results
    */
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;
    
    // Connect to database, will run when instanciated
    private function __construct() {
        try {

            //Use Config get method to get pdo settings
            $this->_pdo = new PDO("mysql:host=" . Config::get("mysql/host") . ";dbname=" . Config::get("mysql/db"), Config::get("mysql/username"), Config::get("mysql/password"));

            // Catch errors inside the try-block, if error occurs kill the app then output the message returned
        } catch (PDOException $e) {
            die($e->getMessage(0));
        }
    }

    // Check if object is instanciated and instanciate object if its not,else if object is instanciated it will return the instance
    public static function getInstance() {

        //When dealing with static properties u need self then scope resolution operator (::) 
        if(!isset(self::$_instance)) {
            self::$_instance = new DB();
        }

        return self::$_instance;
    }

    // Purpose: Gives ability to query and check if theres an error.
    // First parameter is query string, second one is an array of parameters to use for more security to querys.
    public function query($sql, $params = array()) {
        
        // Reset error to false to not return an error for a previous query (if u have multiple querys)
        $this->_error = false;

        //Check if query is prepared, if prepared succesfully then bind parameters if they exist
        // Perform an assignment to a variable (prepare) and also checking with if
        if($this->_query = $this->_pdo->prepare($sql)) {

            // Assign for use in loop as position for the parameters
            $x = 1;

            //Check if parameters added to array
            if(count($params)) {
                
                //List thru parameters
                foreach($params as $param) {

                    // Assign value from parameters to position in $x
                    $this->_query->bindValue($x, $param);

                    // Increment $x inside the loop
                    $x++;
                }
            }

            // Execute query regardless if they arent any parameters or not
            if($this->_query->execute()) {

                // Store the resultset so the values in the columns of the table represents as objects
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);

                // Update the count with results
                $this->_count = $this->_query->rowCount();

            } else {

                // Set error
                $this->_error = true;
            }
        }

        return $this;
    }

    // Purpose: Perform a specific action (SELECT, DELETE, INSERT INTO, UPDATE) for speeding up query proccess
    // First choose action, which table and then where in the table (column/row).
    public function action($action, $table, $where = array()) {

        // Check if count of $where is equal to 3
        if(count($where) === 3) {

            // Define operators to allow, could be extended
            $operators = array( "=", ">", "<", ">=", "<=");


            // Field represent the column of the table
            $field      = $where[0];
            $operator   = $where[1];
            $value      = $where[2];

            // Check with in_array for specific values
            if(in_array($operator, $operators)) {

                // This is instead of, example: 
                // $sql = "SELECT *  FROM users WHERE id = 1"
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                // Check query for errors and if not retun $this
                // Bind value to the ? in $sql variable
                if(!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        
        return false;
    }

    // Shortcuts for the action method
    public function getAll($table, $where) {
        return $this->action("SELECT *", $table, $where);
    }

    public function delete($table, $where) {
        return $this->action("DELETE", $table, $where);
    }

    public function insert($table, $fields = array()) {
        
        // Check if fields have any data
        if(count($fields)) {

            // Use array_keys method to return all the keys of an array
            $keys = array_keys($fields);

            // Keep track of the ?'s inside of query
            $values = "";

            // Set a counter
            $x = 1;

            // Adding question mark to each value
            foreach($fields as $field) {
                $values .= "?";

                // Check if theres more data and if so add a comma and space
                if($x < count($fields)) {
                    $values .= ", " ;
                }

                // Increment counter here
                $x++;
            }

            // Concatenate on implode function using the keys of the array and convert to string with a seperator (`, `) and then define values
            $sql = "INSERT INTO users (`" . implode('`, `', $keys) . "`) Values ({$values})";

            // Pass in the fields that are bound to ? with the query and if not an error return true
            if(!$this->query($sql, $fields)->error()) {
                return true;
            }
        }
        return false;
    }


    public function update($table, $id, $fields) {

        $set = "";
        $x = 1;

        // Build up set string
        foreach($fields as $name => $value) {
            $set .= "{$name} = ?";
            if($x < count($fields)) {
                $set .= ",";
            }
            $x++;
        }

        // Example $sql = "UPDATE users SET "password = newPassword" WHERE id = 3"
        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

        // Pass in the fields that are bound to ? with the query and if not an error return true
        if(!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }

    // Chain on results method
    public function results() {
        return $this->_results;
    }

    // Get the first result of a table
    public function first() {
        return $this->results()[0];
    }

    // Chain on error method
    public function error() {

        return $this->_error;
    }

    // Chain on count method
    public function count() {

        return $this->_count;
    }
}
