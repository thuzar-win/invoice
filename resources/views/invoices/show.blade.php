@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <span class="panel-title">Invoice</span>
                <div class="pull-right">
                    <a href="{{route('invoices.index')}}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
        <div class="panel-body panel-success">
            <div class="form-group">
                <label>Invoice Name</label>
                <p>{{$invoice->invoice_name}}</p>
            </div>

            <div class="form-group">
                <label>Item Name</label>
                @foreach($invoice->products as $product)
                  <p>{{$product->name}}</p>
                @endforeach
            </div>

            <table>
                <!-- <tbody>
                    @foreach($invoice->products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>${{$product->price}}</td>
                            <td>{{$product->qty}}</td>
                            <td>${{$product->qty * $product->price}}</td>
                        </tr>
                    @endforeach
                </tbody> -->
                <tfoot>
                    <tr>
                        <td></td>
                        <td>Sub Total :</td>
                        <td>${{$invoice->sub_total}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Tax :</td>
                        <td>${{$invoice->discount}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Grand Total :</td>
                        <td>${{$invoice->grand_total}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
