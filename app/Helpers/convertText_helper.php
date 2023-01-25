<?php 
        function convertText($text) {
            $words = explode(" ", $text);
            $conjunctions = ["dan", "atau", "namun", "karena", "sehingga"];
            $prepositions = ["di", "ke", "dari", "dengan"];
            $articles = ["yang", "di", "ke"];
            $result = "";
            foreach($words as $word) {
                if(in_array(strtolower($word), $conjunctions) || in_array(strtolower($word), $prepositions) || in_array(strtolower($word), $articles)) {
                    $result .= $word . " ";
                } else {
                    $result .= ucfirst($word) . " ";
                }
            }
            return $result;
        }
