<?php 

namespace App\Http\Traits;

trait GeneralTrait
{
	public function returnSuccess($code,$msg = '')
	{
			return response()->json([
				'status'			=> true,
				'msg'				=> $msg,
				'code'				=> $code
			]);
	}

	public function returnError($code,$msg = '')
	{
		return response()->json([
				'status'			=> false,
				'msg'				=> $msg,
				'code'				=> $code
		]);
	}

	public function returnData($key,$value,$msg = 'Done')
	{
		return response()->json([
			'status'		=> true,
			'code'			=> 200,
			'msg'			=> $msg,
			$key			=> $value
		]);
	}
	public function returnValidationError($code,$validator)
	{
        //return $validator->errors()->first();
        return $this->returnError($code,$validator->errors()->first());
    }
    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }
    private function getErrorCode($input)
    {
        if($input == "name")
            return "Error ". $input;
        else if($input == "password")
            return "Error ". $input;
        else if($input == "email")
            return "Error ". $input;
        else 
            return "";
    }

}