<?php
require 'vendor/autoload.php';
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('AvancementProgramme2025_NC10-PDAI_05_06_2026_11_29_23.xlsx');
$worksheet = $spreadsheet->getActiveSheet();
$highestColumn = $worksheet->getHighestColumn();
$headers = $worksheet->rangeToArray('A1:' . $highestColumn . '1', NULL, TRUE, FALSE);
print_r($headers[0]);
