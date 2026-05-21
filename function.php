<?php

    function sanitize_outputold($buffer) {
    
        $search = array(
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        );
    
        $replace = array(
            '>',
            '<',
            '\\1',
            ''
        );
    
        $buffer = preg_replace($search, $replace, $buffer);
    
        return $buffer;
}


function sanitize_output($buffer) {

    // Searching textarea and pre
    preg_match_all('#\<textarea.*\>.*\<\/textarea\>#Uis', $buffer, $foundTxt);
    preg_match_all('#\<pre.*\>.*\<\/pre\>#Uis', $buffer, $foundPre);

    // replacing both with <textarea>$index</textarea> / <pre>$index</pre>
    $buffer = str_replace($foundTxt[0], array_map(function($el){ return '<textarea>'.$el.'</textarea>'; }, array_keys($foundTxt[0])), $buffer);
    $buffer = str_replace($foundPre[0], array_map(function($el){ return '<pre>'.$el.'</pre>'; }, array_keys($foundPre[0])), $buffer);

    // your stuff
    $search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s' ,      // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1'
    );

    $buffer = preg_replace($search, $replace, $buffer);

    // Replacing back with content
    $buffer = str_replace(array_map(function($el){ return '<textarea>'.$el.'</textarea>'; }, array_keys($foundTxt[0])), $foundTxt[0], $buffer);
    $buffer = str_replace(array_map(function($el){ return '<pre>'.$el.'</pre>'; }, array_keys($foundPre[0])), $foundPre[0], $buffer);

    return $buffer;
}
function media($name){

    include('connect.php');
    $stat4 = $con->prepare("SELECT  SUM(u_medie_2025) / COUNT(u_medie_2025) AS average FROM " . DB_PREFIX . "medie  WHERE Name = '$name' AND stopx = '0'");
    $stat4->execute();
    $curr  = $stat4->fetch();
    return number_format((float)$curr['average'], 2, '.', '');

    
}

function place($name){

    include('connect.php');
    $stat4 = $con->prepare("SELECT  SUM(nr_place_2025)  AS t_place FROM " . DB_PREFIX . "poztion  WHERE Name = '$name' AND stopx = '0'");
    $stat4->execute();
    $curr  = $stat4->fetch();
    return number_format((float)$curr['t_place'], 0, '.', '');

    
}

function sector($name){

    include('connect.php');
    $stat4 = $con->prepare("SELECT   COUNT(zone) AS average FROM " . DB_PREFIX . "numa_liceu  WHERE zone = '$name' AND stopx = '0'");
    $stat4->execute();
    $curr  = $stat4->fetch();
    return $curr['average'];

    
}
function profil($name){

    include('connect.php');
    $stat4 = $con->prepare("SELECT   COUNT(profil) AS average FROM " . DB_PREFIX . "liceu  WHERE profil = '$name' AND stopx = '0'");
    $stat4->execute();
    $curr  = $stat4->fetch();
    return $curr['average'];

    
}
?>