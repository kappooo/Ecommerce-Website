<?php

/* validate class 
  1-validate string
 *   2-email
 *   3-url
 *   4-ip
 *   5-integer
 *   6-required -> not empty
 */

/**
 * santitzation
 *   1-string
 *    2-email
 *   3-url
 *   4-ip
 */
class validation {

    public function validate($data, $rules) {
        $valid = TRUE;
        foreach ($rules as $key => $rule) {
            $callbacks = explode("|", $rule);
            foreach ($callbacks as $callback) {
                $value = isset($data[$key]) ? $data[$key] : NULL;
                if (is_array($value)) {
                    foreach ($value as $val) {
                        if ($this->$callback($val, $key) == FALSE)
                            $valid == FALSE;
                    }
                } else {
                    if ($this->$callback($value, $key) == FALSE)
                        $valid = FALSE;
                }
            }
        }
        return $valid;
    }

    // we will back for this function ....

    function check_string($value, $key) {
        $pattern = "/^[a-zA-Z\p{Cyrillic}0-9\s\-]+$/u";
        $validate = preg_match($pattern, $value);
        if ($validate == FALSE) {
            echo "<section><div><h3 style='padding: 9px; position: relative;top: 103px;left: 290px;margin-bottom: -6px;
                  text-align: center;font-size: 20px;border: 1px #A09D9D  solid;border-radius: 18px;
                  width: 800px;'>
                the $key must be string... 
             </h3></div></section>";
        }
        return $validate;
    }

    function check_email($value, $key) {
        $validate = filter_var($value, FILTER_SANITIZE_EMAIL);
        if ($validate == FALSE) {
            echo "<h3 style='padding: 20px; position: relative;top: 103px;left: 290px;
                  text-align: center;font-size: 20px;border: 1px #A09D9D  solid;border-radius: 18px;
                  width: 800px;'>
                the $key must be valid email...
             </h3>";
            return $validate;
        }
    }

    function check_url($value, $key) {
        $validate = filter_var($value, FILTER_VALIDATE_URL);
        if ($validate == FALSE) {
            echo "<h3 style='padding: 20px; position: relative;top: 103px;left: 290px;
                  text-align: center;font-size: 20px;border: 1px #A09D9D  solid;border-radius: 18px;
                  width: 800px;'>
                the $key must be valid url...
             </h3>";
        }
        return $validate;
    }

    function check_ip($value, $key) {
        $validate = filter_var($value, FILTER_VALIDATE_IP);
        if ($validate == FALSE) {
            echo "<h3 style='padding: 20px; position: relative;top: 103px;left: 290px;
                  text-align: center;font-size: 20px;border: 1px #A09D9D  solid;border-radius: 18px;
                  width: 800px;'>
                the $key must be valid ip... 
             </h3>";
        }
        return $validate;
    }

    function check_required($value, $key) {
        $validate = !empty($value);
        if ($validate == FALSE) {
             echo "<h3 style='padding: 20px; position: relative;top: 103px;left: 290px;
                  text-align: center;font-size: 20px;border: 1px #A09D9D  solid;border-radius: 18px;
                  width: 800px;'>
                the $key is required please... 
             </h3>";
        }
        return $validate;
    }

    function sanitize_item($value, $key) {
        $flage = null;
        switch ($key) {
            case 'email':
                $value = substr($value, 0, 250);
                $filter = FILTER_SANITIZE_EMAIL;
                break;
            case 'url':
                $filter = FILTER_SANITIZE_URL;
                break;
            case 'int':
                $filter = FILTER_SANITIZE_NUMBER_INT;
                break;
            default:
                $filter = FILTER_SANITIZE_STRING;
                $flage = FILTER_FLAG_NO_ENCODE_QUOTES;
                break;
        }
        $validate = filter_var($value, $filter, $flage);
        if ($validate == FALSE) {
            throw new Exception("ERROR :: the $key is invalid");
        }
        echo $validate;
        return $validate;
    }

}
