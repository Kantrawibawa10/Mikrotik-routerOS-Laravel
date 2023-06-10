<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function transaksi(Request $request)
    {
        // Instantiate class
        $DOKUClient = new DOKU\Client;
        // Set your Client ID
        $DOKUClient->setClientID('[YOUR_CLIENT_ID]');
        // Set your Shared Key
        $DOKUClient->setSharedKey('[YOUR_SHARED_KEY]');
        // Call this function for production use
        $DOKUClient->isProduction(true);

        // Setup VA payment request data
        $params = array(
            'customerEmail' => $request["email"],
            'customerName' => $request["customerName"],
            'amount' => $request["amount"],
            'invoiceNumber' => random_strings(20),
            'expiryTime' => $request["expiredTime"],
            'info1' => $request["info1"],
            'info2' => $request["info2"],
            'info3' => $request["info3"],
            'reusableStatus' => $request["reusableStatus"]
        );

        $DOKUClient->generateBcaVa($params);
        $DOKUClient->generateMandiriVa($params);
        $DOKUClient->generateBsiVa($params);
        $DOKUClient->generateDokuVa($params);


        // Mapping the notification received from Jokul
        $notifyHeaders = getallheaders();
        $notifyBody = json_decode(file_get_contents('php://input'), true); // You can use to parse the value from the notification body
        $targetPath = '/payments/notifications'; // Put this value with your payment notification path
        $secretKey = 'SK-xxxxxxx'; // Put this value with your Secret Key

        // Prepare Signature to verify the notification authenticity
        $signature = \DOKU\Common\Utils::generateSignature($notifyHeaders, $targetPath, file_get_contents('php://input'), $secretKey);

        // Verify the notification authenticity
        if ($signature == $notifyHeaders['Signature']) {
            http_response_code(200); // Return 200 Success to Jokul if the Signature is match
            // TODO update transaction status on your end to 'SUCCESS'
        } else {
            http_response_code(401); // Return 401 Unauthorized to Jokul if the Signature is not match
            // TODO Do Not update transaction status on your end yet
        }
    }
}
