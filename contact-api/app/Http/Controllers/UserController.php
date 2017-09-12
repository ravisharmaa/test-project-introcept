<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserCreateRequest;
use App\Models\UserDetail;
use App\User;

class UserController extends Controller
{


    protected $fileName= 'userData.csv';

    public function storeDetails(UserCreateRequest $request)
    {
       $user = User::create([
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
       }

       return response()->json(json_encode([
           'status'=>'Ok',
           'data'=>$user
       ]),200);
    }

    protected function __saveDataToCsv()
    {
        $data = User::select(
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
        return true;
    }
}
