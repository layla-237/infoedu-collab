<?php
        global $con;
        global $where; 
        global $and;
        
        if(isset($_SESSION['name1']) && isset($_SESSION['name2'])){
            $name1 = $_SESSION['name1'];
            $name2 = $_SESSION['name2'];
            $stmt = $con->prepare("SELECT * FROM " . DB_PREFIX . "filter  WHERE rand1 = ? AND rand2 = ?");
            $stmt->execute(array($name1, $name2));
            $rows2 = $stmt->fetch();
            $where = '';
            if($rows2['s1'] == 1){
                $where .= "zone = 'Sector 1' OR ";
            }   
            if($rows2['s2'] == 1){
                $where .= "zone = 'Sector 2' OR ";
            }
            if($rows2['s3'] == 1){
                $where .= "zone = 'Sector 3' OR ";
            }
            if($rows2['s4'] == 1){
                $where .= "zone = 'Sector 4' OR ";
            }
            if($rows2['s5'] == 1){
                $where .= "zone = 'Sector 5' OR ";
            }
            if($rows2['s6'] == 1){
                $where .= "zone = 'Sector 6' OR ";
            }
            if($rows2['p1'] == 1){
                $where .= "profil = 'Real' OR ";
            }
            if($rows2['p2'] == 1){
                $where .= "profil = 'Umanist' OR ";
            }
            if($rows2['p3'] == 1){
                $where .= "profil = 'Resurse naturale si Protecția mediului' OR ";
            }
            if($rows2['p4'] == 1){
                $where .= "profil = 'Servicii' OR ";
            }   
            if($rows2['p5'] == 1){
                $where .= "profil = 'Tehnic' OR ";
            }

            $where = rtrim($where, ' OR ');
            if($where != ''){
                $and=' AND';
            }else{
                $and = '';
            }


        $stmt = $con->prepare("SELECT * FROM " . DB_PREFIX . "numa_liceu  WHERE $where $and stopx = 0");
                $stmt->execute();
        }else{
                $stmt = $con->prepare("SELECT * FROM " . DB_PREFIX . "numa_liceu  WHERE stopx = 0");
        $stmt->execute();
        }

        $row  = $stmt->fetchAll();
        $rows = $stmt->rowCount();
      
 
       // $rows = $row[0];
       
        $page_rows = 9;
 
        $last = ceil($rows/$page_rows);
 
        if($last < 1){
                $last = 1;
        }
 
        $pagenum = 1;
 
        if(isset($_GET['pn'])){
                $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
        }
 
        if ($pagenum < 1) {
                $pagenum = 1;
        }
        else if ($pagenum > $last) {
                $pagenum = $last;
        }
 
        $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

        if(isset($_SESSION['name1']) && isset($_SESSION['name2'])){
                $stmt1 = $con->prepare("SELECT * FROM " . DB_PREFIX . "numa_liceu  WHERE $where $and stopx = 0 $limit");
                $stmt1->execute();

        }else{
                $stmt1 = $con->prepare("SELECT * FROM " . DB_PREFIX . "numa_liceu  WHERE stopx = 0 $limit");
                $stmt1->execute();
        }
     
        

     
 
        $paginationCtrls = '';
 
        if($last != 1){
               
        if ($pagenum > 1) {
        $previous = $pagenum - 1;
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="table_btn">Previous</a> &nbsp; &nbsp; ';
               
                for($i = $pagenum-4; $i < $pagenum; $i++){
                        if($i > 0){
                        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="table_btn">'.$i.'</a> &nbsp; ';
                        }
            }
    }
       
        $paginationCtrls .= ''.$pagenum.' &nbsp; ';
       
        for($i = $pagenum+1; $i <= $last; $i++){
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="table_btn">'.$i.'</a> &nbsp; ';
                if($i >= $pagenum+4){
                        break;
                }
        }
 
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="table_btn">Next</a> ';
    }
        }
 
?>