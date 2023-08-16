<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function response($status = 200, $message = null, $data = null, $code = 200)
    {
        return response()->json(compact('status', 'message', 'data'), $code);
    }
    public function fmtErr($errors)
    {
        $message = null;
        foreach ($errors as $k => $v) :
            if (is_array($v)) :
                foreach ($v as $key => $value) {
                    $message .= $message ? '<br>' . $value : $value;
                }
            else :
                $message .=  $message ? '<br>' . $v : $v;
            endif;
        endforeach;
        return $message;
    }
}
