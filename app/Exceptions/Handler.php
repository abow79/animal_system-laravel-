<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\ApiResponseTrait;    //引用特徵
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

//加入以上類別

class Handler extends ExceptionHandler
{
    use ApiResponseTrait;   //這邊的use意義在於使用引入的特徵
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $e)
    {
        // dd($e);  印出送數的參數並暫停程式
        $result=$request->expectsJson()? 'true':'false';
        if($request->expectsJson()){            //判斷當前的請求 返回json 的回應還是普通回應(確認accept標頭的值是application/json)
            if($e instanceof ModelNotFoundException){
                return $this->errorResponse(        //會自動設定Content-Type header的值為application/json,並使用json_encode將陣列轉成json格式。
                        '找不到資源',   
                    Response::HTTP_NOT_FOUND    //狀態碼
                );
            }
            if($e instanceof NotFoundHttpException){       //找不到網址時跳出錯誤
                return $this->errorResponse(
                    '無法找到此網址',
                    Response::HTTP_NOT_FOUND
                );
            }
            if($e instanceof MethodNotAllowedException){
                return $this->errorResponse(
                    $e->getMessage(),                     //回傳例外內的訊息
                    Response::HTTP_METHOD_NOT_ALLOWED
                );
            }
        }

        return parent::render($request, $e);    //執行父類別的render方法
    }
}
?>
