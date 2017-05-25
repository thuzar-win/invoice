@extends('layouts.master')
@section('content')
<form action="<?= URL::to('store') ?>" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div id="invoice">
      <div class="panel panel-success">
          <div class="panel-heading">
              <div class="clearfix">
                  <span class="panel-title">New Invoice</span>
                  <a href="{{route('invoices.index')}}" class="btn btn-success pull-right">Back</a>
              </div>
          </div>
          <div class="panel-body">
              @include('invoices.form')
          </div>
          <div class="panel-footer">
              <a href="{{route('invoices.index')}}" class="btn btn-default">CANCEL</a>

              <input type="submit" value="CREATE" class="btn btn-success">
          </div>
      </div>
  </div>
</form>
@endsection

@push('scripts')
    <script src="<?= URL::asset('/js/vue.min.js') ?>"></script>
    <script src="<?= URL::asset('/js/vue-resource.min.js') ?>"></script>
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = '{{csrf_token()}}';

        window._form = {
            invoice_name: '',
            sub_total: '',
            grand_total: '',
            discount: 0,
            products: [{
                name: '',
                price: 0,
                qty: 1,
                total: 0

            }]
        };
    </script>
    <script src="<?= URL::asset('/js/app.js') ?>"></script>
@endpush
