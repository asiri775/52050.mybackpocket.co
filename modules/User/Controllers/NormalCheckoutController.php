<?php


namespace Modules\User\Controllers;


use Illuminate\Http\Request;
use Modules\FrontendController;

class NormalCheckoutController extends FrontendController
{
    public function showInfo(){
        return view("Booking::frontend.normal-checkout.info");
    }
    public function confirmPayment(Request $request, $gateway)
    {
        $gateways = get_payment_gateways();
        if (empty($gateways[$gateway]) or !class_exists($gateways[$gateway])) {
            return $this->sendError(__("Payment gateway not found"));
        }
        $gatewayObj = new $gateways[$gateway]($gateway);
        if (!$gatewayObj->isAvailable()) {
            return $this->sendError(__("Payment gateway is not available"));
        }
        $res = $gatewayObj->confirmNormalPayment($request);
        $status = $res[0] ?? null;
        $message = $res[1] ?? null;
        $redirect_url = $res[2] ?? null;

        if(empty($redirect_url)) $redirect_url = route('user.wallet');

        return redirect()->to($redirect_url)->with($status ? "success" : "error",$message);

    }

    public function sendError($message, $data = [])
    {
        return  redirect()->to(route('user.wallet'))->with('error',$message);
    }

    public function cancelPayment(Request $request, $gateway)
    {

        $gateways = get_payment_gateways();
        if (empty($gateways[$gateway]) or !class_exists($gateways[$gateway])) {
            return $this->sendError(__("Payment gateway not found"));
        }
        $gatewayObj = new $gateways[$gateway]($gateway);
        if (!$gatewayObj->isAvailable()) {
            return $this->sendError(__("Payment gateway is not available"));
        }
        $res =  $gatewayObj->cancelNormalPayment($request);
        $status = $res[0] ?? null;
        $message = $res[1] ?? null;
        $redirect_url = $res[2] ?? null;

        if(empty($redirect_url)) $redirect_url = route('user.wallet');

        return redirect()->to($redirect_url)->with($status ? "success" : "error",$message);
    }

    public function updateAmount(Request $request){
        $amount= $request['amount'];
        $today = date("Ymd");
        $rand = rand(1,10000);
        $orderId = $today . $rand;  
        $updatedAmount=str_replace("$","",format_money($amount));
        $token = "name205"."CAD"."2001".date("Y-m-d").$updatedAmount.$orderId;
        $hashedToken = hash('sha256', $token);
        $response=array('amount'=>$updatedAmount,'txnToken'=>$hashedToken,'orderId'=>$orderId);
        return json_encode($response);
    }
}
