<?php
trait QueryBuilder
{

    public $tableName = '';
    public $where = '';
    public $operator = '';
    public $selectField = '*';
    public $orderBy = '';
    public $innerJoin = '';

    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    //Where and
    public function where($field, $compare, $value)
    {
        if (empty ($this->where)) {
            $this->operator = ' WHERE ';
        } else {
            $this->operator = ' AND ';
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }

    // Where or
    public function orWhere($field, $compare, $value)
    {
        if (empty ($this->where)) {
            $this->operator = ' WHERE ';
        } else {
            $this->operator = ' OR ';
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }

    // Like
    public function whereLike($field, $value) {
        if (empty ($this->where)) {
            $this->operator = ' WHERE ';
        } else {
            $this->operator = ' AND ';
        }
        $this->where .= "$this->operator $field LIKE '$value'";
        return $this;
    }

    //Select
    public function select($field = '*')
    {
        $this->selectField = $field;
        return $this;
    }

    //Order by
    public function orderBy($field, $type='ASC') {
        $this->orderBy = 'ORDER BY ' .$field.' '.$type;
        return $this;
    }

    //All line
    public function get()
    {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->orderBy";
        $query = $this->query($sqlQuery);

        //Reset field
        $this->resetQuery();


        if(!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    //Inner join
    public function join($tableName, $relationship) {
        $this->innerJoin.= 'INNER JOIN '.$tableName.' ON '.$relationship.' ';
        return $this->innerJoin;
    }

    //Insert
    public function insert($data) {
        $tableName = $this->tableName;
        $insertStatus = $this->insertData($tableName,$data);
        return $insertStatus;
    }

    //Update
    public function update($data) {
        $whereUpdate = str_replace('WHERE', '', $this->where);
        $whereUpdate = trim($whereUpdate);
        $tableName = $this->tableName;
        $updateStatus = $this->updateData($tableName, $data, $whereUpdate);
        return $updateStatus;
    }

    //Delete
    public function delete() {
        $whereDelete = str_replace('WHERE', '', $this->where);
        $whereDelete = trim($whereDelete);
        $tableName = $this->tableName;
        $deleteStatus = $this->deleteData($tableName, $whereDelete);
        return $deleteStatus;
    }

    //First line
    public function first() {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->where";
        $query = $this->query($sqlQuery);

        //Reset field
        $this->resetQuery();

        if(!empty($query)) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function resetQuery() {
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->orderBy = '';
        $this->innerJoin = '';
    }
}