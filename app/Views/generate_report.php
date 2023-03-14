<?php
// Database configuration
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "system_db";

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'system_db');



// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query the data for the report
$sql = "SELECT id, Product, Prod_id, Brand, Quan, Date_Created FROM brancha
UNION
SELECT id, Product, Prod_id, Brand, Quan, Date_Created FROM branchb
UNION
SELECT Product, Prod_id, Brand, Quan, `Date/Time`, 'n/a' FROM sent_ab
UNION
SELECT Product, Prod_id, Brand, Quan, `Date/Time`, 'n/a' FROM sent_ba
";

$result = mysqli_query($connection, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Create a new PHPExcel object
    require_once "PHPExcel.php";
    $objPHPExcel = new PHPExcel();
    
    // Set properties for the workbook
    $objPHPExcel->getProperties()->setCreator("Your Name")
                                     ->setLastModifiedBy("Your Name")
                                     ->setTitle("Report")
                                     ->setSubject("Report")
                                     ->setDescription("Report")
                                     ->setKeywords("report")
                                     ->setCategory("Report");

    // Add data to the worksheet
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle('Report Data');
    $columns = mysqli_fetch_fields($result);
    $col_index = 0;
    foreach ($columns as $column) {
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col_index, 1, $column->name);
        $col_index++;
    }
    $row = 2;
    while ($data = mysqli_fetch_assoc($result)) {
        $col_index = 0;
        foreach ($data as $value) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col_index, $row, $value);
            $col_index++;
        }
        $row++;
    }

    // Set headers for the download
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="report.xlsx"');
    header('Cache-Control: max-age=0');

    // Write the Excel file to output buffer and flush it
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
} else {
    echo "No results found.";
}

// Close the database connection
mysqli_close($connection);
?>
