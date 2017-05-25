@extends('layouts.master')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <span class="panel-title">Invoices</span>
                <a href="{{route('invoices.create')}}" class="btn btn-success pull-right"><img src="images/add.png" alt="">Add Invoice</a>
            </div>

            <!-- search box -->
              <div class="col-md-6">
                    <br><br>
                    <form role="search" action="{{route('invoices.index')}}" method="get">
                      <div class="input-group custom-search-form">
                        <input type="text" name="search" class="form-control" placeholder="Search ....">
                        <span class="input-group-btn">&nbsp;
                          <button type="submit" class="btn btn-warning ">
                            <i class="fa fa-search">Search</i>
                          </button>
                        </span>
                      </div>
                    </form>
              </div>
    <!-- end search box -->
        </div>
        <br><br><br>
        <div class="panel-body">
            @if($invoices->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Invoice Name</th>
                        <th># of items</th>
                        <th>Grand Total</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{$invoice->invoice_name}}</td>

                            @foreach($invoice->products as $product)
                                    <td>{{ $product->qty }}</td>
                            @endforeach

                            <td>${{$invoice->grand_total}}</td>

                            <td class="text-right">
                                <a href="{{route('invoices.show', $invoice)}}" class="btn btn-warning btn-sm">PDF</a>
                                <a href="{{route('invoices.edit', $invoice)}}" class="btn btn-primary btn-sm">Edit</a>
                                <form class="form-inline" method="post"
                                    action="{{route('invoices.destroy', $invoice)}}"
                                    onsubmit="return confirm('Are you sure?')"
                                >
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $invoices->render() !!}
            @else
                <div class="invoice-empty">
                    <p class="invoice-empty-title">
                        No Invoices were created.
                        <a href="{{route('invoices.create')}}">Create Now!</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
