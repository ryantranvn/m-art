@extends('adminbsb.partials.sub_layout')

@section('search')
    <form id="frmSearchOrder" class="searchForm" method="get" action="{{ url(BULK_SYSTEM.'/'.$controller) }}">
        @php($searchRequire = "searchOrder")

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.customer_name') }}</label>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control {{ $searchRequire }}" name="customer_name" value="{{ $searchValues['customer_name'] }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.product_status') }}</label>
                @include('adminbsb.partials.search_status', ['statusOf' => 'order', 'searchValue' => $searchValues['status']])
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <a href="{{ url(BULK_SYSTEM.'/'.$controller) }}" class="btn btn-primary waves-effect m-r-10">{{ trans('adminbsb.btn_show_all') }}</a>
                <a href="#" class="btn bg-deep-orange waves-effect m-r-10 btnResetSearch">{{ trans('adminbsb.btn_reset') }}</a>
                <button class="btn btn-success waves-effect" type="submit">{{ trans('adminbsb.btn_search') }}</button>
            </div>
        </div>
    </form>
@endsection

@section('action')
    <div class="row">
        <div class="col-sm-12">
            @if ($orders->count() == 0)
                {{ trans('adminbsb.no_data') }}
            @else
                <table class="table table-striped table-bordered tableResize hasDetailRow tableOrder">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th data-sort="customer_name" class="sorting">{{ trans('adminbsb.customer_name') }}</th>
                        <th data-sort="subtotal" class="sorting">{{ trans('adminbsb.order_subtotal') }}</th>
                        <th data-sort="tax" class="sorting">{{ trans('adminbsb.tax') }}</th>
                        <th data-sort="delivery" class="sorting">{{ trans('adminbsb.delivery') }}</th>
                        <th data-sort="total" class="sorting">{{ trans('adminbsb.total') }}</th>
                        <th data-sort="status" class="sorting" style="width: 100px">{{ trans('adminbsb.order_status') }}</th>
                        <th data-sort="created_at" class="sorting">{{ trans('adminbsb.created_at') }}</th>
                        <th data-sort="updated_at" class="sorting">{{ trans('adminbsb.last_updated_at') }}</th>
                        <th data-sort="updated_by" class="sorting">{{ trans('adminbsb.last_updated_by') }}</th>
                        {{--<th>{{ trans('adminbsb.action') }}</th>--}}
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('adminbsb.customer_name') }}</th>
                        <th>{{ trans('adminbsb.order_subtotal') }}</th>
                        <th>{{ trans('adminbsb.tax') }}</th>
                        <th>{{ trans('adminbsb.delivery') }}</th>
                        <th>{{ trans('adminbsb.total') }}</th>
                        <th>{{ trans('adminbsb.order_status') }}</th>
                        <th>{{ trans('adminbsb.created_at') }}</th>
                        <th>{{ trans('adminbsb.last_updated_at') }}</th>
                        <th>{{ trans('adminbsb.last_updated_by') }}</th>
                        {{--<th>{{ trans('adminbsb.action') }}</th>--}}
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($orders as $key => $order)
                        <tr>
                            <td class="align-center details-control" data-id="{{ $order->order_id }}" data-note="{{ $order->note }}"></td>
                            <td class="align-center">{{ $order->customer_name }}</td>
                            <td class="align-center"><span class="currencyPositive">{{ $order->subtotal }}</span></td>
                            <td class="align-center"><span class="currencyPositive">{{ $order->tax }}</span></td>
                            <td class="align-center"><span class="currencyPositive">{{ $order->delivery }}</span></td>
                            <td class="align-center"><span class="currencyPositive">{{ $order->total }}</span></td>
                            <td class="align-center">
                                @include('adminbsb.partials.button_status', ['statusOf' => 'order', 'status' => $order->status, 'id' => $order->order_id])
                            </td>
                            @php($arrCreatedDatetime = separateDatetime($order->created_at))
                            <td class="align-center">{{ $arrCreatedDatetime[0] }}<br/>{{ $arrCreatedDatetime[1] }}</td>
                            @php($arrUpdatedDatetime = separateDatetime($order->updated_at))
                            <td class="align-center">{{ $arrUpdatedDatetime[0] }}<br/>{{ $arrUpdatedDatetime[1] }}</td>
                            <td class="align-center">
                                @php($userId = $order->updated_by == 0 ? $order->created_by : $order->updated_by)
                                {{ getUser($userId)->name }}
                            </td>
                            {{--<td class="align-center">--}}
                                {{--<a class="btn btn-xs btn-info waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$order->order_id) }}">{{ trans('adminbsb.btn_view') }}</a>--}}
                                {{--<a class="btn btn-xs btn-warning waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$order->order_id.'/edit') }}">{{ trans('adminbsb.btn_edit') }}</a>--}}
                                {{--<button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$order->order_id) }}">{{ trans('adminbsb.btn_delete') }}</button>--}}
                            {{--</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    {{ $orders->appends(request()->query())->links('adminbsb.partials.pagination') }}
                    @include('adminbsb.partials.frm_delete')
                    @include('adminbsb.partials.modal', ['module' => 'order'])
                </div>
            @endif
        </div>
    </div>
@endsection