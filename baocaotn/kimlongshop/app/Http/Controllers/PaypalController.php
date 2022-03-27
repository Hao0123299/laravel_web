<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('pages.paypal.paypal');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $total_paypal = \Session::get('total_pay');
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder(
            [
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction'),
                    "cancel_url" => route('cancelTransaction'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $total_paypal
                        ]
                    ]
                ]
            ]
        );

        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('checkout')
                ->with('error', 'Quá trình thanh toán thát bại, quý khách vui lòng kiểm tra lại thông tin.');
        } else {
            return redirect()
                ->route('checkout')
                ->with(
                    'error',
                    $response['message'] ?? 'Quá trình thanh toán thát bại, quý khách vui lòng kiểm tra lại thông tin.'
                );
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            \Session::put('paypal_succcess', true);
            return redirect()
                ->route('checkout')
                ->with('success', 'Thanh toán đơn hàng thành công, quý khách vui long nhập thông tin để xác nhận đơn hàng.');
        } else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Thanh toán đơn hàng thành công.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('checkout')
            ->with('error', $response['message'] ?? 'Bạn đã kết thúc giao dich online.');
    }
}
