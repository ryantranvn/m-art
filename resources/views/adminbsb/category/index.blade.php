@extends('adminbsb.partials.sub_layout')

@section('search')
    <form id="frmSearchCategory" class="searchForm" method="get" action="{{ url(BULK_SYSTEM.'/'.$controller) }}">
        @php($searchRequire = "searchCategory")

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.category_name') }}</label>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control {{ $searchRequire }}" name="category_name" value="{{ $searchValues['category_name'] }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                    <label class="form-label">{{ trans('adminbsb.category_status') }}</label>
                    @include('adminbsb.partials.search_status', ['statusOf' => 'category', 'searchValue' => $searchValues['status']])
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
        @if ($categories->count() == 0)
            {{ trans('adminbsb.no_data') }}
        @else
        <table class="table table-striped table-bordered tableResize">
            <thead>
            <tr>
                <th style="width: 50px">#</th>
                <th>{{ trans('adminbsb.category_picture') }}</th>
                <th data-sort="name" class="sorting">{{ trans('adminbsb.category_name') }}</th>
                <th data-sort="description" class="sorting">{{ trans('adminbsb.category_desc') }}</th>
                <th data-sort="order" class="sorting" style="width: 80px">{{ trans('adminbsb.category_order') }}</th>
                <th data-sort="status" class="sorting" style="width: 100px">{{ trans('adminbsb.category_status') }}</th>
                <th>{{ trans('adminbsb.action') }}</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>#</th>
                <th>{{ trans('adminbsb.category_picture') }}</th>
                <th>{{ trans('adminbsb.category_name') }}</th>
                <th>{{ trans('adminbsb.category_desc') }}</th>
                <th>{{ trans('adminbsb.category_order') }}</th>
                <th>{{ trans('adminbsb.category_status') }}</th>
                <th>{{ trans('adminbsb.action') }}</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach ($categories as $key => $category)
            <tr>
                <td class="align-center">{{ $loop->iteration }}</td>
                <td class="align-center">
                    @if ($category->picture != null && $category->picture != "")
                        <img src="{{ url('/storage'.$category->picture) }}" class="img-responsive thumbnailInTable" />
                    @else
                        <img src="{{ asset(BULK_SYSTEM_THEME.'/images/default.jpg') }}" class="img-responsive thumbnailInTable" />
                    @endif
                </td>
                <td>{{ $category->name }}</td>
                <td>{{ str_limit($category->description, STRING_LIMIT_IN_TABLE) }}</td>
                <td class="align-center editInline" data-table="categories" data-field="order" data-field-id="category_id" data-id="{{ $category->category_id }}">{{ $category->order }}</td>
                <td class="align-center">
                    @include('adminbsb.partials.button_status', ['statusOf' => 'category', 'status' => $category->status, 'id' => $category->category_id])
                </td>
                <td class="align-center">
                    <a class="btn btn-xs btn-info waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$category->category_id) }}">{{ trans('adminbsb.btn_view') }}</a>
                    <a class="btn btn-xs btn-warning waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$category->category_id.'/edit') }}">{{ trans('adminbsb.btn_edit') }}</a>
                    <button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$category->category_id) }}">{{ trans('adminbsb.btn_delete') }}</button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            {{ $categories->appends(request()->query())->links('adminbsb.partials.pagination') }}

            @include('adminbsb.partials.frm_delete')
            @include('adminbsb.partials.modal', ['module' => 'category'])
        </div>
        @endif
    </div>
</div>
@endsection