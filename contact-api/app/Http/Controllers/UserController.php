<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var string
     */
    protected $fileName= 'userData.csv';

    public function storeDetails(UserCreateRequest $request)
    {
        $this->saveDataToCsv($request->all());

        return response()->json(json_encode([
           'status'=>'Ok',
           'data'=>'data'
       ]),200);
    }

    /**
     * @return array|bool
     */
    public function retrieveCsvData()
    {
    	$data = $this->getDataFromCsv();
    	return $data;
    }


    /**
     * @param $data
     * @return bool
     */
    protected function saveDataToCsv($data)
    {
        $file = (fopen($this->fileName,"a"));
        fputcsv($file, array_keys($data));
        fputcsv($file, array_values($data));
        fclose($file);
        return true;
    }

    /**
     * @return array|bool
     */
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
