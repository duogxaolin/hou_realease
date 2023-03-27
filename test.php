<?php
require_once('config.php');
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
                // Đọc dữ liệu từ tệp Excel
                $spreadsheet = IOFactory::load($duogxaolin->home_url()."/path/excel/students.xlsx");
                $worksheet = $spreadsheet->getActiveSheet();
                $data = array();
                foreach ($worksheet->getRowIterator() as $row) {
                    $rowData = array();
                    foreach ($row->getCellIterator() as $cell) {
                        $rowData[] = $cell->getValue();
                    }
                    $data[] = $rowData;
                }

                // Hiển thị dữ liệu trên trang web
                echo '<table>';
                foreach ($data as $row) {
                    echo '<tr>';
                    foreach ($row as $cell) {
                        echo '<td>' . $cell . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
?>
