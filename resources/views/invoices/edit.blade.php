@extends('layouts.master')

@section('content')

<form action="<?= URL::to('update') ?>" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div id="invoice">
        <div class="panel panel-default" v-cloak>
            <div class="panel-heading">
                <div class="clearfix">
                    <span class="panel-title">Create Invoice</span>
                    <a href="{{route('invoices.index')}}" class="btn btn-default pull-right">Back</a>
                </div>
            </div>
            <div class="panel-body">
                @include('invoices.form')
            </div>
            <div class="panel-footer">
                <a href="{{route('invoices.index')}}" class="btn btn-default">CANCEL</a>

                  <input type="submit" value="UPDATE" class="btn btn-success">
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

        window._form = {!! $invoice->toJson() !!};
    </script>
    <script src="<?= URL::asset('/js/app.js') ?>"></script>
@endpush
