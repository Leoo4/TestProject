<!-- 
 *  /ExcelReader.php
 *  
 *  Part of LJ Test project.
 *
 *  Here we read an excel file where all the information of students are.
 *
 -->
 
<?php

  use PhpOffice\PhpSpreadsheet\IOFactory;
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  
  require_once 'C:\Users\ljuar\vendor\autoload.php';

  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
  $reader->setReadDataOnly(TRUE);
  $spreadsheet = $reader->load("Calificaciones.xlsx");

  $worksheet = $spreadsheet->getActiveSheet();
  $dataStudents = array(array());
  $row1=0;
  $col1=0;
  foreach ($worksheet->getRowIterator() as $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE);
    foreach ($cellIterator as $cell) {
      $dataStudents[$row1][$col1]=$cell->getValue();
      $col1++;
    }
    $col1=0;
    
    $row1++;
  }
?>
