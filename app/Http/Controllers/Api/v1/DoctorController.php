<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class DoctorController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = Doctor::all();
        
        return $this->successResponse($doctors);
      
    }

    /**
     * Create one new Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

            'user_id'=>'required|integer',
            'img_id'=>'required|integer',
            'speciality_id'=>'required|integer',
            'commercial_name'=>'required|string',
            'home_visit'=>'required|bool',
            'degree'=>'required|string',
            'short_description'=>'required',
            'description'=>'required',
            'total_rates'=>'required|integer',
            
        ]);
       
        $doctor = Doctor::create($request->all());          
        return $this->successResponse($doctor,Response::HTTP_CREATED);
       
    }

    /**
     * get one Rate
     *
     * @return Illuminate\Http\Response
     */
    public function show($doctor)
    {
        //

        $doctor = Doctor::findOrFail($doctor);
        return $this->successResponse($doctor);
        
    }

    /**
     * update an existing one Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$doctor)
    {

        $this->validate($request,[
            'user_id'=>'integer',
            'img_id'=>'integer',
            'speciality_id'=>'integer',
            'commercial_name'=>'string',
            'home_visit'=>'bool',
            'degree'=>'string',
            'short_description'=>'string',
            'description'=>'string',
            'total_rates'=>'integer',
            
        ]);
        $doctor = Doctor::findOrFail($doctor);
        $doctor->fill($request->all());

        
        if($doctor->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $doctor->save();
        return $this->successResponse($doctor);
    }

     /**
     * remove an existing one doctor
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($doctor)
    {
        $doctor = Doctor::findOrFail($doctor);
        $doctor->delete();
        return $this->successResponse($doctor);
      
    }

}
