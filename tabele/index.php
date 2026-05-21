<?php


if (isset($_SESSION['username'])) { // If the user is login
    $addButton = $_SESSION['addbutton'];
    $formIDName = $_SESSION['formidname'];
    $tableIDName = $_SESSION['tableidname'];
    $modalDataTarget = $_SESSION['modaldatatarget'];
    $modaIDlName = $_SESSION['modalidname'];
    $fieldName = $_SESSION['fieldname'];
    $labelMName = $_SESSION['labelmname'];
    $tableHeader = $_SESSION['tableheader'];
    $placeHolder = $_SESSION['placeholder'];
    $required1 = $_SESSION['required'];
    $tableClass = $_SESSION['tableclass'];
    $modalTitle = $_SESSION['modaltitle'];
    $maxlength = $_SESSION['maxlength'];
    global $stmt1;

    $pageTitle1 = 'HOME';



    $pageTitle1 = 'TABLE';
    //include('pagination.php');



    ?>
    <link rel="stylesheet" href="layout/css/table.css">
    <div class="dashboard-container">
        <!-- Dashboard Sidebar -->
        <?php
        include 'template/sidebar.php';
        ?>
        <!-- Dashboard Sidebar Overlay -->


        <div class="dashboard-sidebar-overlay" id="dashboardSidebarOverlay"></div>
        <!-- Dashboard Main Content -->
        <main class="dashboard-main">
            <!-- Dashboard Header -->
            <?php
            include 'template/header_main.php';
            ?>
            <div class="dashboard-content" style="padding-left: 90px;  padding-right: 90px; ">
                <!-- Overview View -->
                <div class="dashboard-view active" id="overview">
                    <h1>Table</h1>
                    <a class="table_btn" href="add.php">Add</a>
                    <br>

                    <!--<input type="text"  id="myInputSearch" placeholder="Search for names.." title="Type in a name" style="margin-top: 34px;">
                    <button onclick="SearchFunction()"  class="btn btn-primary">Search</button>  -->                  
                    <?php 
                    include('pagination.php');
                    ?>

                  
                </div>
            </div>
        </main>
    </div>

    <!-- Dashboard Content -->





    <?php
    include  $tpl . 'footer.php';

} else {

    header('Location: index.php');

    exit();
}

ob_end_flush(); // Release the output

?>