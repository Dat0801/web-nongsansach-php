<?php
class Request
{

    private $__rules = [], $__messages = [], $__errors = [];
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost()
    {
        if ($this->getMethod() == 'post') {
            return true;
        }
        return false;
    }

    public function isGet()
    {
        if ($this->getMethod() == 'get') {
            return true;
        }
        return false;
    }

    public function getFields()
    {

        $dataFields = [];

        if ($this->isGet()) {
            //Xử lý lấy dữ liệu với phương thức get
            if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                    if (is_array($value)) {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }

        if ($this->isPost()) {
            //Xử lý lấy dữ liệu với phương thức post
            if (!empty($_POST)) {
                foreach ($_POST as $key => $value) {
                    if (is_array($value)) {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }

        return $dataFields;
    }

    //set rules
    public function rules($rules = [])
    {
        $this->__rules = $rules;
    }

    //set message
    public function messages($messages = [])
    {
        $this->__messages = $messages;
    }

    //run validate
    public function validate()
    {
        $this->__rules = array_filter($this->__rules);

        $checkValidate = true;

        if (!empty($this->__rules)) {
            $dataFields = $this->getFields();
            foreach ($this->__rules as $fieldName => $ruleItem) {
                $ruleItemArr = explode('|', $ruleItem);
                foreach ($ruleItemArr as $rule) {

                    $ruleName = null;
                    $ruleValue = null;

                    $ruleArr = explode(':', $rule);

                    $ruleName = reset($ruleArr);

                    if (count($ruleArr) > 1) {
                        $ruleValue = end($ruleArr);
                    }

                    if ($ruleName == 'required') {
                        if (empty(trim($dataFields[$fieldName]))) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }

                    if ($ruleName == 'min') {
                        if (strlen(trim($dataFields[$fieldName])) < $ruleValue) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }

                    if ($ruleName == 'max') {
                        if (strlen(trim($dataFields[$fieldName])) > $ruleValue) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }

                    if ($ruleName == 'email') {
                        if (!filter_var($dataFields[$fieldName], FILTER_VALIDATE_EMAIL)) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }

                    if ($ruleName == 'unique') {
                        $tableName = null;
                        $fieldCheck = null;

                        if (!empty($ruleArr[1])) {
                            $tableName = $ruleArr[1];
                        }
                        if (!empty($ruleArr[2])) {
                            $fieldCheck = $ruleArr[2];
                        }

                        if (!empty($tableName) && !empty($fieldCheck)) {
                            if (count($ruleArr) == 3) {
                                $checkExist = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE $fieldCheck = '$dataFields[$fieldName]'")->rowCount();
                            } else if (count($ruleArr) == 4) {
                                if (!empty($ruleArr[3]) && preg_match('~.+?\=.+?~is', $ruleArr[3])) {
                                    $conditionWhere = $ruleArr[3];
                                    $conditionWhere = str_replace('=', '<>', $conditionWhere);
                                    $checkExist = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE $fieldCheck = '$dataFields[$fieldName]' AND $conditionWhere")->rowCount();
                                }
                            }
                            if ($checkExist > 0) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                    }
                }
            }
        }
        return $checkValidate;
    }

    //get errors
    public function errors($fieldName = '')
    {
        if (!empty($this->__errors)) {
            if ($fieldName == '') {
                $errorsArr = [];
                foreach ($this->__errors as $key => $value) {
                    $errorsArr[$key] = reset($value);
                }
                return $errorsArr;
            }
            return reset($this->__errors[$fieldName]);
        }
        return false;
    }

    public function setErrors($fieldName, $ruleName)
    {
        $this->__errors[$fieldName][$ruleName] = $this->__messages[$fieldName . '.' . $ruleName];
    }
}