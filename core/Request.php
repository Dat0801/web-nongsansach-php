<?php
class Request
{

    private $__rules = [], $__messages = [], $errors = [];
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
                }
            }
        }
        return $checkValidate;
    }

    //get errors
    public function errors($fieldName = '')
    {
        if (!empty($this->errors)) {
            if ($fieldName == '') {
                $errorsArr = [];
                foreach ($this->errors as $key => $value) {
                    $errorsArr[$key] = reset($value);
                }
                return $errorsArr;
            }
            return reset($this->errors[$fieldName]);
        }
        return false;
    }

    public function setErrors($fieldName, $ruleName)
    {
        $this->errors[$fieldName][$ruleName] = $this->__messages[$fieldName . '.' . $ruleName];
    }
}