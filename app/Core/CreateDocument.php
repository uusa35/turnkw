<?php
namespace App\Core;

use App\Http\Requests\Request;
use Carbon\Carbon;
use PhpOffice\PhpWord\Autoloader as phpWordLoad;
use PhpOffice\PhpWord\PhpWord as phpWord;
use PhpOffice\PhpWord\Reader\HTML;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 1/2/16
 * Time: 11:43 PM
 */
class CreateDocument
{

    public $phpWordLoad;
    public $phpWord;
    public $phpWordFactory;

    public function __construct()
    {
        $this->phpWordLoad = new phpWordLoad();
        $this->phpWordLoad->register();
        $this->phpWord = new phpWord();

    }


    public function CreateFromTemp(Request $request)
    {
        $document = $this->phpWord->loadTemplate(storage_path('quotations\temp\quotation_TEMP.docx'));

        $document->setValue('ref', $request->ref);
        $document->setValue('attention', $request->attention);
        $document->setValue('client', $request->client);
        $document->setValue('project', $request->project);

        foreach ($request->item as $key => $item) {

            $document->setValue('item' . $key, $item);

        }

        $document->setValue('notes', $request->notes);
        $document->setValue('price', $request->price);
        $document->setValue('name', $request->name);
        $document->setValue('date', Carbon::now()->toDateTimeString());


        //$newDoc = \PhpOffice\PhpWord\IOFactory::createWriter($this->phpWord, 'Word2007');

        $fileName = 'quotation-'.$request->ref . '-' . rand(1, 1000);

        $document->saveAs(storage_path('quotations'.'/'. $fileName . '.docx'));

        return $fileName;
    }

}