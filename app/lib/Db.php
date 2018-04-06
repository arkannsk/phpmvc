<?php

namespace app\lib;

use PDO;
use PDOException;

class Db
{
    protected $db;

    public function __construct()
    {
        try {
            $config = require $_SERVER['DOCUMENT_ROOT'] . '/app/config/db.php';
            $dsn = $config['server'] . ':host=' . $config['host'] .
                ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];

            $this->db = new PDO($dsn, $config['user'], $config['password']);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    /**
     * @param string $sql query(sql format)
     * @param array $params additional
     * @return array
     */

    public function getRow($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $sql query(sql format)
     * @param array $params additional
     * @return \PDOStatement
     */

    protected function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':' . $key, $val, $type);
            }
        }
        $stmt->execute();
        return $stmt;
    }

}