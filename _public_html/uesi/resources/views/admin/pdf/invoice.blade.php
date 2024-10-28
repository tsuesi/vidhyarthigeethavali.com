
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Invoice</title>
<base href="https://ocotrixcommece.siafinfoweb.com/admin/" />
<link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid mt-5">
    <div style="page-break-after: always;">
    <h1 style="color:black !important">{{$orderData->invoice_prefix}} #{{$orderData->invoice_no}}</h1>
    <div class="table-responsive">
    <table class="table table-bordered align-items-center table-flush">
      <thead>
        <tr>
          <td colspan="2">Order Details</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width: 50%;"><address>
            <strong>{{config('settingConfig.config_store_name')}}</strong><br />
            Address 1
            </address>
            <b>Telephone</b> {{$orderData->telephone}}<br />
                        <b>E-Mail</b> {{$orderData->email}}<br />
            <b>Web Site:</b> <a href="{{url('/')}}">{{url('/')}}</a></td>
          <td style="width: 50%;"><b>Date Added</b> {{$orderData->order_date}}<br />
                        <b>Order ID:</b> {{$orderData->id}}<br />
            <b>Payment Method</b> {{$orderData->payment_method}}<br />
                        <b>Shipping Method</b> {{$orderData->shipping_name}}<br />
            </td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td style="width: 50%;"><b>Payment Address</b></td>
          <td style="width: 50%;"><b>Shipping Address</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><address>
            {{$orderData->firstname}}<br />{{$orderData->shipping_address_1}},{{$orderData->shipping_address_2}}<br />{{$orderData->city}} {{$orderData->shipping_postcode}}<br />{{$orderData->orderCountry->name}}
            </address></td>
          <td><address>
            {{$orderData->firstname}}<br />{{$orderData->shipping_address_1}},{{$orderData->shipping_address_2}}<br />{{$orderData->city}} {{$orderData->shipping_postcode}}<br />{{$orderData->orderCountry->name}}
            </address></td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td><b>#</b></td>
          <td><b>Name</b></td>
          <td class="text-right"><b>Quantity</b></td>
          <td class="text-right"><b>Unit Price</b></td>
          <td class="text-right"><b>Total</b></td>
        </tr>
      </thead>
      <tbody>
        @php $subTotal = 0; @endphp
        @foreach($orderData->products as $value)
          <tr>
            <td> <img src="{{asset('uploads')}}/product/{{$value->image}}" alt="" height="80" width="80"> </td>
            <td>{{$value->name}}</td>
            <td class="text-right">{{$value->quantity}}</td>
            <td class="text-right">{{config('settingConfig.config_currency')}}{{number_format($value->total,2) }}</td>
            <td class="text-right">{{config('settingConfig.config_currency')}}{{number_format( $value->total * $value->quantity,2)}}</td>
          </tr>
          @php $subTotal += $value->total * $value->quantity; @endphp
        @endforeach
        <tr>
          <td class="text-right" colspan="4"><b>Sub-Total</b></td>
          <td class="text-right">{{config('settingConfig.config_currency')}}{{number_format( $subTotal * $value->quantity,2)}}</td>
        </tr>
        <tr>
          <td class="text-right" colspan="4"><b>{{$orderData->shipping_name}}</b></td>
          <td class="text-right">{{config('settingConfig.config_currency')}}{{$orderData->shipping_charge}}</td>
        </tr>
        @if($orderData->tax_amount > 0)
        <tr>
          <td class="text-right" colspan="4"><b>Tax</b></td>
          <td class="text-right">{{config('settingConfig.config_currency')}}{{$orderData->tax_amount}}</td>
        </tr>
        @endif
        <tr>
          <td class="text-right" colspan="4"><b>Total</b></td>
          <td class="text-right">{{config('settingConfig.config_currency')}}{{number_format($orderData->grand_total,2)}}</td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
  </div>
</body>
</html>
<style>
 * { font-family: DejaVu Sans, sans-serif; }
</style>
