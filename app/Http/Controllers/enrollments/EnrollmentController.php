<?php

namespace App\Http\Controllers\enrollments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enrollment;
use App\Models\user;
use Carbon\Carbon;

class EnrollmentController extends Controller
{
    public function submitEnrollment(Request $request){
        

    $enroll = enrollment::create([

            'user_id' => $request->_id,
            'user_name'=>  $request->user_name,
            'creation_day' => date('Y-m-d'),
            'first_name' => $request->firstName,
            'last_name' => $request->lastName ,
            'dob' => $request->dob ,
            'phone_number' => $request-> phone,
            'zipcode' => $request->zip ,
            'apt_number' => $request-> apt,
            'street' => $request->street ,
            'city' => $request->city ,
            'state' => $request->state ,
            'heart_probs' => $request->cardio ,
            'heart_rate' => $request->hrt_rate ,
            'pace_maker' => $request->pace_mkr,
            'other_cardio_probs' => $request-> other_cardio,
            'height' => $request-> height,
            'weight' => $request->weight ,
            'dr_name' => $request-> dr_name,
            'dr_phone_number' => $request-> dr_phone,
            'dr_npi' => $request->npi ,
            'medicare' => $request->mdcr
        ]);

       $createdID = $enroll->id;

        session()->flash('success' , 'Enrollment added successfully');
        return response()->json(compact('createdID'));

    }




    

    public function chartData(Request $request)
    {  
      $days = enrollment::select('creation_day')->distinct()->orderBy('id','DESC')->take(5)->get(); 
         foreach($days as $day)
         {
            if($request->AuthSuccess == "Admin")
            {
               $data = enrollment::where('creation_day',$day->creation_day)->count();
            }
            else if($request->AuthSuccess == "Agent")
            {    
               $data = enrollment::where('creation_day',$day->creation_day)->where('user_id',$request->id)->count();
            }
           $arryData[]= $data ;
         }
         $labels = $days->pluck('creation_day');
         $now = Carbon::now()->toDateString();
         $today = enrollment::select('creation_day')->where('creation_day',$now)->count();
         return response()->json(compact('labels','arryData','today'));
    }








    public function listData(Request $request)
    {
      if($request->AuthSuccess == "Admin")
      {
        $enrolls = enrollment::select('id','user_id','user_name','creation_day','first_name','last_name','dob','phone_number',
                                      'zipcode','apt_number','street','city','state','heart_probs','heart_rate','pace_maker',
                                      'other_cardio_probs','height','weight','dr_name','dr_phone_number','dr_npi','medicare')
                                      ->orderBy('id','DESC')->get();
      }
      else if($request->AuthSuccess == "Agent")
      {
         $enrolls = enrollment::select('id','user_id','user_name','creation_day','first_name','last_name','dob','phone_number',
                                      'zipcode','apt_number','street','city','state','heart_probs','heart_rate','pace_maker',
                                      'other_cardio_probs','height','weight','dr_name','dr_phone_number','dr_npi','medicare')
                                      ->where('user_id',$request->id)
                                      ->orderBy('id','DESC')->get();
      }
      return view('index.list',compact('enrolls'));
     }










     public function editItem(Request $request)
     {

        $enroll = enrollment::find($request->editId);

        $arrayEnroll=([$enroll->first_name,
                       $enroll->last_name,
                       $enroll->dob,
                       $enroll->phone_number,
                       $enroll->zipcode,
                       $enroll->apt_number,
                       $enroll->street,
                       $enroll->city,
                       $enroll->state,
                       $enroll->heart_probs,
                       $enroll->heart_rate,
                       $enroll->pace_maker,
                       $enroll->other_cardio_probs,
                       $enroll->height,
                       $enroll->weight,
                       $enroll->dr_name,
                       $enroll->dr_phone_number,
                       $enroll->dr_npi,
                       $enroll->medicare
                    ]);



        return response()->json(compact('arrayEnroll'));





     }




     public function updateEnrollment(Request $request)
     {

        $enroll = enrollment::find($request->enrol_id);

        $enroll->update([

                        
                        'first_name' => $request->firstName,
                        'last_name' => $request->lastName ,
                        'dob' => $request->dob ,
                        'phone_number' => $request-> phone,
                        'zipcode' => $request->zip ,
                        'apt_number' => $request-> apt,
                        'street' => $request->street ,
                        'city' => $request->city ,
                        'state' => $request->state ,
                        'heart_probs' => $request->cardio ,
                        'heart_rate' => $request->hrt_rate ,
                        'pace_maker' => $request->pace_mkr,
                        'other_cardio_probs' => $request-> other_cardio,
                        'height' => $request-> height,
                        'weight' => $request->weight ,
                        'dr_name' => $request-> dr_name,
                        'dr_phone_number' => $request-> dr_phone,
                        'dr_npi' => $request->npi ,
                        'medicare' => $request->mdcr

        ]);

        session()->flash('success' , 'Enrollment updated successfully');
       //return redirect()->Back();



     }




     public function deleteItem(Request $request)
     {


        $enroll = enrollment::find($request->item_id);

        $enroll->delete();

     }



}
