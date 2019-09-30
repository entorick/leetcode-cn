// 给定一个字符串 s，找到 s 中最长的回文子串。
// 500 ms 14.6 MB
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        if (strlen($s) == 0){
            return "";
        }
        
        $maxStr = "";
        for($i = 0; $i < strlen($s); $i++){
            $left = $i - 1;
            $right = $i + 1;
            if (empty($maxStr)){
                $maxStr = $s[$i];
            }
            
            if ($left >= 0 && $right < strlen($s) && $s[$left] === $s[$right]){
                $curStr = $s[$i];
                $flag = true;
                // 单
                $curStr = $s[$left] . $curStr . $s[$right];
                while($flag){
                    $left = $left - 1;
                    if ($left < 0){
                        $maxStr = (strlen($curStr) > strlen($maxStr)) ? $curStr : $maxStr;
                        $flag = false;
                    }
                    $right = $right + 1;
                    if ($right >= strlen($s)){
                        $maxStr = (strlen($curStr) > strlen($maxStr)) ? $curStr : $maxStr;
                        $flag = false;
                    }
                    if ($s[$left] === $s[$right]){
                        $curStr = $s[$left] . $curStr . $s[$right];
                    } else {
                        $maxStr = (strlen($curStr) > strlen($maxStr)) ? $curStr : $maxStr;
                        $flag = false;
                    }
                }
            }
            
            $left = $i - 1;
            $right = $i + 1;
            if ($left >= 0 && $s[$left] === $s[$i]){
                $curStr = $s[$i];
                $flag = true;
                // 双， 这里左探索；用右也行，但只能探索一种
                $curStr = $s[$left] . $curStr;
                $right = $i;
                while($flag){
                    $left = $left - 1;
                    if ($left < 0){
                        $maxStr = (strlen($curStr) > strlen($maxStr)) ? $curStr : $maxStr;
                        $flag = false;
                    }
                    $right = $right + 1;
                    if ($right >= strlen($s)){
                        $maxStr = (strlen($curStr) > strlen($maxStr)) ? $curStr : $maxStr;
                        $flag = false;
                    }
                    if ($s[$left] === $s[$right]){
                        $curStr = $s[$left] . $curStr . $s[$right];
                    } else {
                        $maxStr = (strlen($curStr) > strlen($maxStr)) ? $curStr : $maxStr;
                        $flag = false;
                    }
                }
            }
            
            
        }
        return $maxStr;
    }
}
