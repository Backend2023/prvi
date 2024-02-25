<?php
/**
 * This library converts html table to excel file including formatting
 * 
 *  */
require_once('../vendor/autoload.php');

$html = '<table><tr><th>Column A</th><th>Column B</th></tr><tr><td>Value A</td><td>Value B</td></tr></table>';
$htmlPhpExcel = new \Ticketpark\HtmlPhpExcel\HtmlPhpExcel($html);

$htmlPhpExcel->process()->save('myFile.xlsx');