<?php
namespace App\Traits;   //路徑
use Symfony\Component\HttpFoundation\Response;

trait ApiResponseTrait{
    /*
         *統一定義例外回覆方法
         *@param mixed $message 錯誤訊息
         *@param mixed $status  http狀態碼
         *@param mixed|null $code  自定義的錯誤編號
         *@return \Illuminate\Http\Response  
    */
    public function errorResponse($message,$status,$code=null){     //表示參數的預設值為null但是呼叫時也可以帶入值
        $code=$code??$status;    //$code為null時預設為HTTP狀態碼
        return response()->json(
                [
                    'message' => $message,
                    'code' => $code
                ],
                $status
        );
    }
}

?>









?>