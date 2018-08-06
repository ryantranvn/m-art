@extends('adminbsb.partials.sub_layout')

@section('search')
    <form id="frmSearchSupplier" class="searchForm" method="get" action="{{ url(BULK_SYSTEM.'/'.$controller) }}">
        @php($searchRequire = "searchSupplier")

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.supplier_name') }}</label>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control {{ $searchRequire }}" name="name" value="{{ $searchValues['name'] }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.user_status') }}</label>
                @include('adminbsb.partials.search_status', ['statusOf' => 'user', 'searchValue' => $searchValues['status']])
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.location') }}</label>
                @include('adminbsb.partials.select_province', ['provinceId' => $searchValues['province_id']])
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
            @if ($suppliers->count() == 0)
                {{ trans('adminbsb.no_data') }}
            @else
                <table class="table table-striped table-bordered tableResize">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th>{{ trans('adminbsb.picture') }}</th>
                        <th data-sort="name" class="sorting">{{ trans('adminbsb.user_name') }}</th>
                        <th data-sort="location_id" class="sorting">{{ trans('adminbsb.location') }}</th>
                        <th data-sort="status" class="sorting" style="width: 100px">{{ trans('adminbsb.user_status') }}</th>
                        <th data-sort="updated_at" class="sorting">{{ trans('adminbsb.last_updated_at') }}</th>
                        <th data-sort="updated_by" class="sorting">{{ trans('adminbsb.last_updated_by') }}</th>
                        <th>{{ trans('adminbsb.action') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('adminbsb.picture') }}</th>
                        <th>{{ trans('adminbsb.user_name') }}</th>
                        <th>{{ trans('adminbsb.location') }}</th>
                        <th>{{ trans('adminbsb.user_status') }}</th>
                        <th>{{ trans('adminbsb.last_updated_at') }}</th>
                        <th>{{ trans('adminbsb.last_updated_by') }}</th>
                        <th>{{ trans('adminbsb.action') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($suppliers as $key => $supplier)
                        <tr>
                            <td class="align-center">{{ $loop->iteration }}</td>
                            <td class="align-center">
                                @if ($supplier->thumbnail != null && $supplier->thumbnail != "")
                                <img src="{{ url('/storage'.$supplier->thumbnail) }}" class="img-responsive thumbnailInTable" />
                                @else
                                <img src="{{ asset(BULK_SYSTEM_THEME.'/images/default.jpg') }}" class="img-responsive thumbnailInTable" />
                                @endif
                            </td>
                            <td>{{ $supplier->name }}</td>
                            <td class="align-center">
                                @isset ($supplier->province_id) {{ $supplier->province_name }} @endisset
                            </td>
                            <td class="align-center">
                                @include('adminbsb.partials.button_status', ['statusOf' => 'supplier', 'status' => $supplier->status, 'id' => $supplier->supplier_id])
                            </td>
                            @php($arrDatetime = separateDatetime($supplier->updated_at))
                            <td class="align-center">{{ $arrDatetime[0] }}<br/>{{ $arrDatetime[1] }}</td>
                            <td class="align-center">
                                @php($supplierId = $supplier->updated_by == 0 ? $supplier->created_by : $supplier->updated_by)
                                {{ getUser($supplierId)->name }}
                            </td>
                            <td class="align-center">
                                <a class="btn btn-xs btn-info waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$supplier->supplier_id) }}">{{ trans('adminbsb.btn_view') }}</a>
                                <a class="btn btn-xs btn-warning waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$supplier->supplier_id.'/edit') }}">{{ trans('adminbsb.btn_edit') }}</a>
                                <button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$supplier->supplier_id) }}">{{ trans('adminbsb.btn_delete') }}</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    {{ $suppliers->appends(request()->query())->links('adminbsb.partials.pagination') }}

                    @include('adminbsb.partials.frm_delete')
                    @include('adminbsb.partials.modal', ['module' => 'supplier'])
                </div>
            @endif
        </div>
    </div>
@endsection