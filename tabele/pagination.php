<?php

include('table/function.php');
global $con;
$fieldName = $_SESSION['fieldname'];
$dbname = $_SESSION['dbname'];
$keyId = $_SESSION['keyid'];
$where = $_SESSION['Where'];
$searchField = $_SESSION['searchfield'];
$columns = $_SESSION['Columns'];
$tableHeader     = $_SESSION['tableheader'];  


$stmt = $con->prepare("SELECT * FROM " . $dbname . $where . "");
$stmt->execute();
$row = $stmt->fetchAll();
$rows = $stmt->rowCount();
$page_rows = 10;
$last = ceil($rows / $page_rows);
if ($last < 1) {
        $last = 1;
}
$pagenum = 1;
if (isset($_GET['pn'])) {
        $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
if ($pagenum < 1) {
        $pagenum = 1;
} else if ($pagenum > $last) {
        $pagenum = $last;
}
$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;


$query = '';
$output = array();
$query .= "SELECT * FROM  " . $dbname . $where . " ";

if (isset($_GET['search'])) {
        $i = 1;
        if ($where == ' ') {
                foreach ($searchField as $fName => $value) {
                        $$fName = $value;
                        if ($i == 1) {
                                $query .= 'WHERE ' . $$fName . ' LIKE "%' . $_GET['search'] . '%" ';
                        } else {
                                $query .= 'OR ' . $$fName . ' LIKE "%' . $_GET['search'] . '%" ';
                        }
                        $i++;
                }
        } else {
                foreach ($searchField as $fName => $value) {
                        $$fName = $value;
                        if ($i == 1) {
                                $query .= 'AND (' . $$fName . ' LIKE "%' . $_GET['search'] . '%" ';
                        } else {
                                $query .= 'OR ' . $$fName . ' LIKE "%' . $_GET['search'] . '%" ';
                        }
                        $i++;
                }
                $query .= ') ';
        }

}
/*
if (isset($_POST["order"])) {
        $query .= 'ORDER BY ' . $columns[$_POST['order'][0]['column']] . ' ' . $_POST['order'][0]['dir'] . ' ';
} else {
        $query .= 'ORDER BY ' . $keyId . ' DESC ';
}
if ($_POST["length"] != -1) {
        $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


*/
$query .= " " . $limit;
//echo $query;
//$stmt1 = $con->prepare("SELECT * FROM " . DB_PREFIX . "numa_liceu  WHERE stopx = 0  $limit");
$stmt1 = $con->prepare($query);
$stmt1->execute();



$paginationCtrls = '';

if ($last != 1) {

        if ($pagenum > 1) {
                $previous = $pagenum - 1;
                $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '" class="table_btn">Previous</a> &nbsp; &nbsp; ';

                for ($i = $pagenum - 4; $i < $pagenum; $i++) {
                        if ($i > 0) {
                                $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="table_btn">' . $i . '</a> &nbsp; ';
                        }
                }
        }

        $paginationCtrls .= '' . $pagenum . ' &nbsp; ';

        for ($i = $pagenum + 1; $i <= $last; $i++) {
                $paginationCtrls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '" class="table_btn">' . $i . '</a> &nbsp; ';
                if ($i >= $pagenum + 4) {
                        break;
                }
        }

        if ($pagenum != $last) {
                $next = $pagenum + 1;
                $paginationCtrls .= ' &nbsp; &nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '" class="table_btn">Next</a> ';
        }
  
}

?>

      
        <div id="table_disp">

                <table>
                        <thead>
                                <tr>
                    <?php
                        $i=0;
                        foreach($tableHeader as $hTable){
                            echo '<th>'.lang($hTable).'</th>';
                            $i++;    
                        }
                    ?>
					<th>Control</th>
                                </tr>
                        </thead>
                        <tbody id='table-body'>
                                <?php

                                $rows = $stmt1->fetchAll();
                                foreach ($rows as $row) {
                                        echo '<tr>';
                                        
                                        foreach ($searchField as $fName => $value) {

                                        echo '<td>' . $row[$value] . '</td>';
                                        }
                                        
                                        echo '<td>
                        <a href="table/edit.php?id=' . $row['id_numa_liceu'] . '" class="table_btn">Edit</a>
                        <a href="action.php?id=' . $row['id_numa_liceu'] . '" class="btn-delete" onclick="return confirm(\'lll\')"  >Delete</a> 
                    </td>';
                                        echo '</tr>';
                                }
                                ?>
                        </tbody>
                </table> <!-- Dashboard Content -->
                <br>
                <div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
        </div>

    