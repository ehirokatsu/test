<?php

class QuizLib
{
    /**
     * 表示する時のエスケープ処理関数
     *
     * @param string $str チェックする文字列。
     * @return string     エスケープ処理後の文字列
     */
    public function isEscape($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
    

    /**
     * 入力チェック関数(文字列用)
     *
     * @param string $str チェックする文字列。
     * @return string $result チェック結果。
     */
    public function isQuiz1($str)
    {
        //戻り値用
        $result = "";

        if (empty($str)) {
            //クイズ１回答が空白の場合
            $result = ERROR_INPUT;
        } elseif (!is_string($str)) {
            //クイズ１回答が文字列以外の場合
            $result = ERROR_ILLEGAL;
            //正誤判定を行う
        } elseif (strcmp("HTML", $str) === 0) {
            //正誤判定を行う
            $result = CORRECT;
        } else {
            $result = INCORRECT;
        }
        return $result;
    }

    /**
     * 入力チェック関数(文字列用)
     *
     * @param array $array チェックする文字列。
     * @return boolean $result 文字列が正常であればtrue, 異常であればfalse。
     */
    public function isQuiz2($array)
    {
        //戻り値用
        $result = "";
        //$array = "aa";//デバッグ用
        
        if (empty($array)) {
            //クイズ2回答が空白の場合
            $result = ERROR_INPUT;
        } elseif (!is_array($array)) {
            //クイズ2回答が配列以外の場合
            $result = ERROR_ILLEGAL;
            //正誤判定を行う
        } elseif (in_array("Apache", $array)
               && !in_array("iPhone", $array)
               && in_array("Tomcat", $array)) {
            $result = CORRECT;
        } else {
            $result = INCORRECT;
        }
        return $result;
    }
    /**
     * 入力チェック関数(文字列用)
     *
     * @param string $str チェックする文字列。
     * @return string $result チェック結果。
     */
    public function isQuiz3($str)
    {
        //戻り値用
        $result = "";
        if (empty($str)) {
            //クイズ3回答が空白の場合
            $result = ERROR_INPUT;
        } elseif (!is_string($str)) {
            //クイズ3回答が文字列以外の場合
            $result = ERROR_ILLEGAL;
            //正誤判定を行う
        } elseif (strcmp("Edge", $str) === 0) {
            //正誤判定を行う
            $result = CORRECT;
        } else {
            $result = INCORRECT;
        }
        echo $result;
        return $result;
    }
    
}

