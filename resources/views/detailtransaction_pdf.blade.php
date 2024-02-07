<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FREEPAY</title>
    <link rel="shortcut icon" href="logo_freepay_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('bootstrap.css')}}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            background-color: white !important;
        }

        .btt {
            width: 100%;
            height: 40px;
            font-family: Mulish;
            font-size: 13px;
            line-height: 16px;
            letter-spacing: 0em;
            text-align: center;
            border-color: #0F84AB;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 p-4">
                <fieldset style="border: solid lightblue;"  class="p-3 shadow-lg">
                    <table class="table table table-striped px-0 mx-0">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr style="border-bottom: 1px solid gray;">
                            <td>
                                <p style="color: #0F709D; font-size:25px;">Details transaction</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Montant du paiement</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td style="text-align: left;">
                                    <p> {{ $transaction->payment_amount }} cfa
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid gray;">
                                <td>
                                    <p>Frais</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td >
                                    <p>{{ $transaction->transaction_amount}} cfa</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Total Paiement:</p>
                                </td>
                                <td></td>
                                <td></td>
                
                                <td>
                                    {{ $transaction->amount }} cfa
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="color: #0F709D;">Payer par</p>
                                    <p style="color: #0F709D;">ID de paiement</p>
                                    <p style="color: #0F709D;">Mode de paiement</p>
                                    <p style="color: #0F709D;">Numero Téléphone</p>
                                    <p style="color: #0F709D;">Url de paiement</p>
                                </td>
                                <td>
                                    <p>{{ $transaction->_client->name}} </p>
                                    <p>{{ $transaction->transaction_id }}</p>
                                    <p>{{ $transaction->_module->label }}</p>
                                    <p>{{ $transaction->_client->phone }}</p>
                                    <p>www.ekanmian.com</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>