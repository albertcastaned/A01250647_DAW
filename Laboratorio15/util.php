<?php

    function getSongLink($string)
    {
        substr($string,-22);
        return substr($string,31);
    }
    
    function chechValid($key)
    {
        $url = "https://open.spotify.com/embed/track/" . $key;
        $arreglo = @get_headers($url);

        $status = $arreglo[0];

        return strpos($status,"200");
        
    }

?>