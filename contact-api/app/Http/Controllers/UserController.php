<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserCreateRequest;
use App\Models\UserDetail;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    protected $fileName= 'userData.csv';

    public function storeDetails(Request $request)
    {

    	/*$user = User::create([
          'name'=> $request->get('name'),
          'email'=>$request->get('email'),
          'password'=>bcrypt('name')
       ]);

       $userDetail = UserDetail::create([
           'user_id'         => $user->id,
           'address'        => $request->get('address'),
           'education'      => $request->get('education'),
           'nationality'    => $request->get('nationality'),
           'contact_mode'   => $request->get('contact_mode'),
           'dob'            => $request->get('dob'),
           'phone'          => $request->get('phone')

       ]);

       if($user && $userDetail){
           $this->__saveDataToCsv();
       }*/

       $this->saveDataToCsv($request->all());

	    return response()->json(json_encode([
           'status'=>'Ok',
           'data'=>'data'
       ]),200);
    }

    protected function __saveDataToCsv()
    {
        /*$data = User::select(
            'users.id',
                    'users.name',
                    'users.email',
                    'user_detail.user_id',
                    'user_detail.address',
                    'user_detail.education',
                    'user_detail.nationality',
                    'user_detail.contact_mode',
                    'user_detail.dob')->leftJoin('user_detail','user_detail.user_id','=','users.id')->get();

        $columns = [
          'User Id',
          'User Name',
          'Email',
          'Address',
          'Education',
          'Nationality',
          'Contact-Mode',
          'Date of Birth'
        ];

        function() use ($data, $columns)
                    {
                        $file = (fopen($this->fileName,'w'));
                        fputcsv($file,$columns);
                        foreach ($data as $row){
                            fputcsv($file,[ $row->id,
                                            $row->name,
                                            $row->email,
                                            $row->address,
                                            $row->education,
                                            $row->nationality,
                                            $row->contact_mode,
                                            $row->dob]);
                        }
                        fclose($file);
                    };
        return true;*/
    }


    public function retrieveCsvData()
    {
    	$data = $this->getDataFromCsv();
    	dd($data);
    	return $data;
    }



    protected function saveDataToCsv($data)
    {
	    $file = (fopen($this->fileName,'w'));
	    $first = true;

	    foreach ($data as $key => $values) {
		    if($first)
		    {
			    fputcsv($file, array_keys($data));
		    }
		    $first=false;

		    fputcsv($file, array_values($data));
	    }

	    fclose($file);
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
