<?php

namespace App\Framework;

use PDO;
use Exception;

require_once '../config/dev.php';


/**
 * Class DAO
 */
abstract class DAO
{
    private $connection;

    /**
     * @return void
     */
    private function checkConnection()
    {
        if ($this->connection === null) {
            return $this->getConnection();
        }
        return $this->connection;
    }

    /**
     * @return void
     */
    private function getConnection()
    {
        try {
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (Exception $errorConnection) {
            return ('Erreur de connection :' . $errorConnection->getMessage());
        }
    }

    /**
     * @param mixed $sql
     * @param null $parameters
     * 
     * @return void
     */
    protected function createQuery($sql, $parameters = null)
    {
        if ($parameters) {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        return $result;
    }

    /**
     * @param mixed $row
     * 
     * @return void
     */
    protected function buildObject($row)
    {
        if ($row) {
            $class = MODEL_PATH . substr((new \ReflectionClass($this))->getShortName(), 0, -3);
            $obj = new $class;
            foreach ($row as $key => $value) {
                if (!is_numeric($key)) {
                    $method = 'set' . ucfirst($key);
                    $obj->$method($row[$key]);
                }
            }
            return $obj;
        }
    }
}
