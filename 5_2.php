// 给定一个字符串 s，找到 s 中最长的回文子串。
// 860 ms 14.6 MB
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
            $curStr = $s[$i];
            $maxStr = (strlen($curStr) > strlen($maxStr)) ? $curStr : $maxStr;
            
            $flag = true;
            while($flag){
                $flag = false;
                if ($left >= 0 && $s[$left] == $s[$i]){
                    $curStr = $s[$left] . $curStr;
                    $flag = true;
                    $left -= 1;
                }
                
                if ($right < strlen($s) && $s[$right] == $s[$i]){
                    $curStr = $curStr . $s[$right];
                    $flag = true;
                    $right += 1;
                }
            }
            
            while(true){
                if ($left < 0 || $right >= strlen($s)){
                    $maxStr = (strlen($curStr) > strlen($maxStr)) ? $curStr : $maxStr;
                    break;
                }
                
                if ($s[$left] === $s[$right]){
                    $curStr = $s[$left] . $curStr . $s[$right];
                } else {
                    $maxStr = (strlen($curStr) > strlen($maxStr)) ? $curStr : $maxStr;
                    break;
                }
                $left -= 1;
                $right += 1;
            }
        }
        return $maxStr;
    }
}
