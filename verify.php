<?php

    $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
    $Amount = 1000; //Amount will be based on Toman
    $Authority = $_GET['Authority'];

    if ($_GET['Status'] == 'OK') {
        // URL also Can be https://ir.zarinpal.com/pg/services/WebGate/wsdl
        $client = new SoapClient('https://de.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentVerification(
                            [
                                    'MerchantID'     => $MerchantID,
                                    'Authority'      => $Authority,
                                    'Amount'         => $Amount,
                                ]
        );

        if ($result->Status == 100) {
            echo 'Transation success. RefID:'.$result->RefID;
        } else {
            echo 'Transation failed. Status:'.$result->Status;
        }
    } else {
        echo 'Transaction canceled by user';
    }
