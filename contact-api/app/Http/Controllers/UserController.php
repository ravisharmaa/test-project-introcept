<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $fileName= 'userData.csv';

    public function storeDetails(Request $request)
    {
        $this->saveDataToCsv($request->all());

        return response()->json(json_encode([
           'status'=>'Ok',
           'data'=>'data'
       ]),200);
    }

    public function retrieveCsvData()
    {
    	$data = $this->getDataFromCsv();
    	return $data;
    }



    protected function saveDataToCsv($data)
    {
        $file = (fopen($this->fileName,"a"));
        fputcsv($file, array_keys($data));
        fputcsv($file, array_values($data));
        fclose($file);
        return true;
    }

    protected function getDataFromCsv()
    {
	    if(!file_exists($this->fileName) || !is_readable($this->fileName)){
		    return false;
        }

	    $header = null;
        $data = [];

	    if (($handle = fopen($this->fileName, 'r')) !== false)
	    {
		    while (($row = fgetcsv($handle, 1000, ',')) !== false)
		    {
			    if(!$header)
				    $header = $row;
			    else
				    $data[] = array_combine($header, $row);
		    }
		    fclose($handle);
	    }
	    return $data;

    }
}
