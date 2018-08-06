@extends('adminbsb.partials.sub_layout')

@section('search')
    <form id="frmSearchContact" class="searchForm" method="get" action="{{ url(BULK_SYSTEM.'/'.$controller) }}">
        @php($searchRequire = "searchContact")

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.contact_name') }}</label>
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
                @include('adminbsb.partials.search_status', ['statusOf' => 'contact', 'searchValue' => $searchValues['status']])
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.email') }}</label>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control {{ $searchRequire }}" name="email" value="{{ $searchValues['email'] }}">
                        </div>
                    </div>
                </div>
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
            @if ($contacts->count() == 0)
                {{ trans('adminbsb.no_data') }}
            @else
                <table class="table table-striped table-bordered tableResize">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th data-sort="name" class="sorting">{{ trans('adminbsb.contact_name') }}</th>
                        <th data-sort="email" class="sorting">{{ trans('adminbsb.email') }}</th>
                        <th data-sort="phone" class="sorting">{{ trans('adminbsb.phone') }}</th>
                        <th data-sort="status" class="sorting" style="width: 100px">{{ trans('adminbsb.contact_status') }}</th>
                        <th data-sort="updated_at" class="sorting">{{ trans('adminbsb.last_updated_at') }}</th>
                        <th data-sort="updated_by" class="sorting">{{ trans('adminbsb.last_updated_by') }}</th>
                        <th>{{ trans('adminbsb.action') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('adminbsb.contact_name') }}</th>
                        <th>{{ trans('adminbsb.email') }}</th>
                        <th>{{ trans('adminbsb.phone') }}</th>
                        <th>{{ trans('adminbsb.contact_status') }}</th>
                        <th>{{ trans('adminbsb.last_updated_at') }}</th>
                        <th>{{ trans('adminbsb.last_updated_by') }}</th>
                        <th>{{ trans('adminbsb.action') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($contacts as $key => $contact)
                        <tr>
                            <td class="align-center">{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td class="align-center">{{ $contact->email }}</td>
                            <td class="align-center">{{ $contact->phone }}</td>
                            <td class="align-center">
                                @include('adminbsb.partials.button_status', ['statusOf' => 'contact', 'status' => $contact->status, 'id' => $contact->contact_id])
                            </td>
                            @php($arrDatetime = separateDatetime($contact->updated_at))
                            <td class="align-center">{{ $arrDatetime[0] }}<br/>{{ $arrDatetime[1] }}</td>
                            <td class="align-center">
                                @if ($contact->updated_by != null)
                                {{ getUser($contact->updated_by)->name }}
                                @endif
                            </td>
                            <td class="align-center">
                                {{--<a class="btn btn-xs btn-info waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$contact->supplier_id) }}">{{ trans('adminbsb.btn_view') }}</a>--}}
                                {{--<a class="btn btn-xs btn-warning waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$contact->supplier_id.'/edit') }}">{{ trans('adminbsb.btn_edit') }}</a>--}}
                                <button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$contact->contact_id) }}">{{ trans('adminbsb.btn_delete') }}</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    {{ $contacts->appends(request()->query())->links('adminbsb.partials.pagination') }}

                    @include('adminbsb.partials.frm_delete')
                    @include('adminbsb.partials.modal', ['module' => 'contact'])
                </div>
            @endif
        </div>
    </div>
@endsection