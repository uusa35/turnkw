<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 1/3/16
 * Time: 1:09 AM
 */

namespace App\Core;


use Illuminate\Http\Request;
use Carbon\Carbon;

class CreateExcelSheet
{
    protected $objPHPExcel;
    protected $IOfactory;

    public function __construct()
    {
        $this->objPHPExcel = new \PHPExcel();
        $this->exTemp = new \PHPExcel();

    }

    /*
     * "from" => "testing"
      "to" => "testing"
      "project" => "testing"
      "invoiceNo" => "testing"
      "po" => "testing"
      "date" => ""
      "projectManager" => "testing"
      "payment" => "transfer"
      "dueDate" => ""
        "unitPrice" => array:4 [▶]
      "lineTotal" => array:4 [▶]
      "quantity" => array:4 [▶]
      "description" => array:4 [▶]
      "totalWords" => "testing"
      "total" => "testing"
      "dueNow" => ""
      "notes" => ""
      "submit" => "submit"
     * */

    public function createSheetFromTemp(Request $request)
    {

        //dd($request->all());
        $excelTemp = \PHPExcel_IOFactory::createReader('Excel2007');
        $excelTemp = $excelTemp->load(storage_path('invoices/temp/invoice_TEMP.xlsx'));
        $excelTemp->setActiveSheetIndex(0);
        $excelTemp->getActiveSheet()
            ->setCellValue('B9', $request->get('from'))// from
            ->setCellValue('B10', $request->get('to'))// to
            ->setCellValue('B11', $request->get('project'))// project
            ->setCellValue('E11', $request->get('invoiceNo'))// invoice No
            ->setCellValue('E12', $request->get('po'))// PO
            ->setCellValue('E13', Carbon::now()->today())// Date
            ->setCellValue('E14', Carbon::now()->today())// project Date
            ->setCellValue('A18', $request->get('projectManager'))// project manager
            ->setCellValue('C18', $request->get('payment'))// payment method / transfer + cheque
            ->setCellValue('E18', $request->get('dueDate')); // due date

        $invoiceItems = count($request->get('description'));

        for ($i = 0; $i <= $invoiceItems-1; $i++) {

            switch($i) {
                case 0:
                    $excelTemp->getActiveSheet()->setCellValue('A23',$request->get('description')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('C23',$request->get('quantity')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('D23',$request->get('unitPrice')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('E23',$request->get('lineTotal')[$i]);
                    break;
                case 1:
                    $excelTemp->getActiveSheet()->setCellValue('A24',$request->get('description')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('C24',$request->get('quantity')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('D24',$request->get('unitPrice')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('E24',$request->get('lineTotal')[$i]);
                    break;
                case 2:
                    $excelTemp->getActiveSheet()->setCellValue('A25',$request->get('description')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('C25',$request->get('quantity')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('D25',$request->get('unitPrice')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('E25',$request->get('lineTotal')[$i]);
                    break;
                case 3:
                    $excelTemp->getActiveSheet()->setCellValue('A26',$request->get('description')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('C26',$request->get('quantity')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('D26',$request->get('unitPrice')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('E26',$request->get('lineTotal')[$i]);
                    break;
                case 4:
                    $excelTemp->getActiveSheet()->setCellValue('A27',$request->get('description')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('C27',$request->get('quantity')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('D27',$request->get('unitPrice')[$i]);
                    $excelTemp->getActiveSheet()->setCellValue('E27',$request->get('lineTotal')[$i]);
                    break;

            }
        }

        $excelTemp->getActiveSheet()->setCellValue('B28', $request->get('totalWords'))//
        ->setCellValue('E28', $request->get('total'))//
        ->setCellValue('B29', $request->get('dueNow'))//
        ->setCellValue('B32', $request->get('notes'));

        $objWriter = \PHPExcel_IOFactory::createWriter($excelTemp, 'Excel2007');

        $fileName = 'invoice-'.Carbon::now()->toDateString() . '-' . rand(1, 1000);

        $objWriter->save(storage_path('invoices/'.$fileName.'.xls'));

        return $fileName;

    }
    /*public function createSheet()
    {
        $this->objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("PHPExcel Test Document")
            ->setSubject("PHPExcel Test Document")
            ->setDescription("Test document for PHPExcel, generated using PHP classes.")
            ->setKeywords("office PHPExcel php")
            ->setCategory("Test result file");
// Add some data
        $this->objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');
// Miscellaneous glyphs, UTF-8
        $this->objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'انشاء الكثير من المعطيات في الموضوع');
// Rename worksheet
        //echo date('H:i:s'), " Rename worksheet", EOL;
        $this->objPHPExcel->getActiveSheet()->setTitle('Simple');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $this->objPHPExcel->setActiveSheetIndex(0);
// Save Excel 2007 file
        //echo date('H:i:s'), " Write to Excel2007 format", EOL;
        $callStartTime = microtime(true);
        $objWriter = \PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
        $objWriter->save(str_replace('.php', '.xlsx', __FILE__));
        $callEndTime = microtime(true);
        $callTime = $callEndTime - $callStartTime;
        //echo date('H:i:s'), " File written to ", str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)), EOL;
        //echo 'Call time to write Workbook was ', sprintf('%.4f', $callTime), " seconds", EOL;
// Echo memory usage
        //echo date('H:i:s'), ' Current memory usage: ', (memory_get_usage(true) / 1024 / 1024), " MB", EOL;
// Save Excel5 file
        //echo date('H:i:s'), " Write to Excel5 format", EOL;
        $callStartTime = microtime(true);
        $objWriter = \PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel5');
        $objWriter->save(storage_path('invoices/invoic.xls'));
    }*/
}