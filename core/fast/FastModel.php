<?php
namespace core\fast;
use core\db\FastSingleton;

class FastModel{
    protected $table = "";
    protected $primaryKey = "id";
    protected $columns = [];

    private $db = null;

    public function __construct(){
        $this->db = FastSingleton::getInstance();
    }

    public function find($primaryKey){
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :pkvalue;";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":pkvalue", $primaryKey);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $sql = "SELECT * FROM {$this->table};";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create(array $data){
        $columns = implode(",", array_keys($data));
        $valuesKeys = ":".implode(",:", array_keys($data));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$valuesKeys});";
        $stmt = $this->db->prepare($sql);

        foreach (array_keys($data) as $key)
            $stmt->bindValue(":".$key, $data[$key]);

        return $stmt->execute();
    }

    public function update($primaryKey, array $data){
        if($this->find($primaryKey)){
            $columns = array_keys($data);
            $columnsValues = array_keys($data);

            foreach ($columnsValues as $key => $value)
                $columnsValues[$key] = ":".$value;

            $set = [];
            for($i = 0; $i < sizeof($columns); $i++){
                $set[] = "{$columns[$i]} = {$columnsValues[$i]}";
            }
            $set = implode(",", $set);
            $sql = "UPDATE {$this->table} SET {$set} WHERE {$this->primaryKey} = :pkvalue;";
            echo $sql;
            $stmt = $this->db->prepare($sql);

            foreach ($columnsValues as $key)
                $stmt->bindValue($key, $data[$key]);

            $stmt->bindValue(":pkvalue", $primaryKey);
            return $stmt->execute();
        }
        return false;
    }

    public function delete($primaryKey){
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :pkvalue;";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":pkvalue", $primaryKey);

        return $stmt->execute();

    }

}
