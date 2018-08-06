@extends('adminbsb.partials.sub_layout')

@section('search')
    <form id="frmSearchProduct" class="searchForm" method="get" action="{{ url(BULK_SYSTEM.'/'.$controller) }}">
        @php($searchRequire = "searchProduct")

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.product_name') }}</label>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control {{ $searchRequire }}" name="name" value="{{ $searchValues['name'] }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.product_status') }}</label>
                @include('adminbsb.partials.search_status', ['statusOf' => 'product', 'searchValue' => $searchValues['status']])
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.supplier') }}</label>
                @include('adminbsb.partials.select_supplier', ['supplierId' => $searchValues['supplier_id'], 'forSearch' => 1])
            </div>
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.location') }}</label>
                @include('adminbsb.partials.select_province', ['provinceId' => $searchValues['province_id'], 'forSearch' => 1])
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.category') }}</label><span class="requireSign">(*)</span>
                @include('adminbsb.partials.select_category', ['categoryId' => $searchValues['category_id'], 'forSearch' => 1])
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
            @if ($products->count() == 0)
                {{ trans('adminbsb.no_data') }}
            @else
                <table class="table table-striped table-bordered tableResize">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th data-sort="category" class="sorting">{{ trans('adminbsb.category') }}</th>
                        <th>{{ trans('adminbsb.picture') }}</th>
                        <th data-sort="name" class="sorting">{{ trans('adminbsb.product_name') }}</th>
                        <th data-sort="price" class="sorting">{{ trans('adminbsb.product_price') }}</th>
                        <th data-sort="supplier" class="sorting">{{ trans('adminbsb.supplier') }}</th>
                        <th data-sort="location" class="sorting">{{ trans('adminbsb.location') }}</th>
                        <th data-sort="status" class="sorting" style="width: 100px">{{ trans('adminbsb.product_status') }}</th>
                        <th data-sort="updated_at" class="sorting">{{ trans('adminbsb.last_updated_at') }}</th>
                        <th data-sort="updated_by" class="sorting">{{ trans('adminbsb.last_updated_by') }}</th>
                        <th>{{ trans('adminbsb.action') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('adminbsb.category') }}</th>
                        <th>{{ trans('adminbsb.picture') }}</th>
                        <th>{{ trans('adminbsb.product_name') }}</th>
                        <th>{{ trans('adminbsb.product_price') }}</th>
                        <th>{{ trans('adminbsb.supplier') }}</th>
                        <th>{{ trans('adminbsb.location') }}</th>
                        <th>{{ trans('adminbsb.product_status') }}</th>
                        <th>{{ trans('adminbsb.last_updated_at') }}</th>
                        <th>{{ trans('adminbsb.last_updated_by') }}</th>
                        <th>{{ trans('adminbsb.action') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <td class="align-center">{{ $loop->iteration }}</td>
                            <td class="align-center">{{ $product->category_name }}</td>
                            <td class="align-center">
                                @if ($product->thumbnail != null && $product->thumbnail != "")
                                    <img src="{{ url('/storage'.$product->thumbnail) }}" class="img-responsive thumbnailInTable" />
                                @else
                                    <img src="{{ asset(BULK_SYSTEM_THEME.'/images/default.jpg') }}" class="img-responsive thumbnailInTable" />
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td class="align-center currencyPositive">{{ $product->price }}</td>
                            <td class="align-center">{{ $product->supplier_name }}</td>
                            <td class="align-center">{{ $product->province_name }}</td>
                            <td class="align-center">
                                @include('adminbsb.partials.button_status', ['statusOf' => 'product', 'status' => $product->status, 'id' => $product->product_id])
                            </td>
                            @php($arrDatetime = separateDatetime($product->updated_at))
                            <td class="align-center">{{ $arrDatetime[0] }}<br/>{{ $arrDatetime[1] }}</td>
                            <td class="align-center">
                                @php($userId = $product->updated_by == 0 ? $product->created_by : $product->updated_by)
                                {{ getUser($userId)->name }}
                            </td>
                            <td class="align-center">
                                <a class="btn btn-xs btn-info waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$product->product_id) }}">{{ trans('adminbsb.btn_view') }}</a>
                                <a class="btn btn-xs btn-warning waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$product->product_id.'/edit') }}">{{ trans('adminbsb.btn_edit') }}</a>
                                <button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$product->product_id) }}">{{ trans('adminbsb.btn_delete') }}</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    {{ $products->appends(request()->query())->links('adminbsb.partials.pagination') }}

                    @include('adminbsb.partials.frm_delete')
                    @include('adminbsb.partials.modal', ['module' => 'product'])
                </div>
            @endif
        </div>
    </div>
@endsection