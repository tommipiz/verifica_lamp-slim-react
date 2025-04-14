<?php
class Db extends MySQLi {
    static protected $instance = null;

    public function __construct($host, $user, $password, $schema) {
        parent::__construct($host, $user, $password, $schema);
    }

    static function getInstance() {
        if (self::$instance == null)
            self::$instance = new Db('my_mariadb', 'root', 'ciccio', 'scuola');
        return self::$instance;
    }

    static function select($table) {
        $db = self::getInstance();
        $query = "SELECT * FROM $table";
        if ($result = $db->query($query)) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    static function selectId($table, $id) {
        $db = self::getInstance();
        $query = "SELECT * FROM $table WHERE id = $id";
        if ($result = $db->query($query)) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    static function create($table, $fields) {
        $db = self::getInstance();
        $columns = implode(", ", array_keys($fields));
        $values = implode("', '", array_values($fields));
        $query = "INSERT INTO $table ($columns) VALUES ('$values')";
        if ($db->query($query)) {
            return "Creato";
        }
        return "Errore nella creazione";
    }

    static function update($table, $fields, $id) {
        $db = self::getInstance();
        $set = implode(", ", array_map(fn($k, $v) => "$k='$v'", array_keys($fields), array_values($fields)));
        $query = "UPDATE $table SET $set WHERE id = $id";
        if ($db->query($query)) {
            return "Aggiornato";
        }
        return "Errore nell'aggiornamento";
    }

    static function destroy($table, $id) {
        $db = self::getInstance();
        $query = "DELETE FROM $table WHERE id = $id";
        if ($db->query($query)) {
            return "Eliminato";
        }
        return "Errore nell'eliminazione";
    }
}

?>