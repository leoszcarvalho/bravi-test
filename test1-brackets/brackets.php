<?php 

function verifyBracketsMatch($text) {
    
    $size = strlen($text);

    $array_match = [];

    for ($i = 0; $i < $size; $i++) {

        switch ($text[$i]) {
            //case it opens a bracket push a number 0 into the array
            case '(': array_push($array_match, 0); break;

            //case it closes a bracket it needs to be of the same type it was opened and if it's not, returns false on the test
            case ')': 
                if (array_pop($array_match) !== 0)
                    return false;
            break;

            //case it opens a bracket of this type push a number 1 into the array
            case '[': array_push($array_match, 1); break;

            //case it closes a bracket of the same type it needs to be of the same type it was opened and if it's not, returns false on the test
            case ']': 
                if (array_pop($array_match) !== 1)
                    return false;
            break;

            case '{': array_push($array_match, 2); break;
            case '}': 
                if (array_pop($array_match) !== 2)
                    return false;
            break;
            default: break;
        }


    }

    return (empty($array_match));
}


//Returns true
var_dump(verifyBracketsMatch("(){}[]"));
echo "<br><br>";

//Returns true
var_dump(verifyBracketsMatch("[{()}](){}"));
echo "<br><br>";

//Returns false
var_dump(verifyBracketsMatch("[]{()"));
echo "<br><br>";

//Returns false
var_dump(verifyBracketsMatch("[{)]"));
echo "<br><br>";


?>