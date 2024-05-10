<?php
class Database
{
    private $__conn;
    private $__apiconn;
    use QueryBuilder;

    // Kết nối database
    function __construct()
    {
        global $db_config;
        global $db_config_country;
        $this->__conn = Connection::getInstance($db_config);
        $this->__apiconn = Connection::getInstance($db_config_country);   
        var_dump($db_config);     
        var_dump($db_config_country);     
        
        if ($this->__conn instanceof PDO) {
            echo "Kết nối cơ sở dữ liệu chính thành công!";
        } else {
            echo "Kết nối cơ sở dữ liệu chính không thành công!";
        }
        
        echo "<br>";
        
        if ($this->__apiconn instanceof PDO) {
            echo "Kết nối cơ sở dữ liệu API thành công!";
        } else {
            echo "Kết nối cơ sở dữ liệu API không thành công!";
        }
    }

    // Thêm dữ liệu
    function insertData($table, $data)
    {
        if (!empty ($data)) {
            $fieldStr = '';
            $valueStr = '';
            foreach ($data as $key => $value) {
                $fieldStr .= $key . ',';
                $valueStr .= "'" . $value . "',";
            }
            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');
            $sql = "INSERT INTO $table($fieldStr) VALUES ($valueStr)";
            $status = $this->query($sql);
            if ($status) {
                return true;
            }
        }
        return false;
    }

    //Sửa dữ liệu
    function updateData($table, $data, $condition = '')
    {
        if (!empty ($data)) {
            $updateStr = '';
            foreach ($data as $key => $value) {
                $updateStr .= "$key='$value',";
            }
            $updateStr = rtrim($updateStr, ',');
            if (!empty ($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            } else {
                $sql = "UPDATE $table SET $updateStr";
            }
            $status = $this->query($sql);
            if ($status) {
                return true;
            }
        }
        return false;
    }

    // Xóa dữ liệu
    function deleteData($table, $condition = '', $permanent = false)
    {
        if ($permanent) {
            if (!empty ($condition)) {
                $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
            } else {
                $sql = 'DELETE FROM ' . $table;
            }
        } else {
            if (!empty ($condition)) {
                $sql = 'UPDATE ' . $table . ' SET TRANGTHAI = 0 WHERE ' . $condition;
            } else {
                $sql = 'UPDATE ' . $table . ' SET TRANGTHAI = 0';
            }
        }
       
        $status = $this->query($sql);

        if ($status) {
            return true;
        }
        return false;
    }

    // Truy vấn câu lệnh sql
    function query($sql)
    {
        try {
            $statement = $this->__conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            $data['message'] = $mess;
            App::$app->loadError('database',$data);
            die();
        }

    }
    function queryApi($sql)
    {
        try {
            $statement = $this->__apiconn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            $data['message'] = $mess;
            App::$app->loadError('database',$data);
            die();
        }

    }


    // Trả về id mới nhất sau khi đã insert
    function lastInsertId()
    {
        return $this->__conn->lastInsertId();
    }
}