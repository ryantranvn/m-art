@extends('adminbsb.partials.sub_layout')

@section('search')
    <form id="frmSearchUser" class="searchForm" method="get" action="{{ url(BULK_SYSTEM.'/'.$controller) }}">
        @php($searchRequire = "searchUser")

        <div class="row">
            <div class="col-sm-6">
                <label class="form-label">{{ trans('adminbsb.restaurant_name') }}</label>
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
            @if ($users->count() == 0)
                {{ trans('adminbsb.no_data') }}
            @else
                <table class="table table-striped table-bordered tableResize">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th data-sort="name" class="sorting">{{ trans('adminbsb.user_name') }}</th>
                        <th data-sort="email" class="sorting">{{ trans('adminbsb.email') }}</th>
                        <th data-sort="address" class="sorting">{{ trans('adminbsb.address') }}</th>
                        <th data-sort="status" class="sorting" style="width: 100px">{{ trans('adminbsb.user_status') }}</th>
                        <th data-sort="updated_at" class="sorting">{{ trans('adminbsb.last_updated_at') }}</th>
                        <th data-sort="updated_by" class="sorting">{{ trans('adminbsb.last_updated_by') }}</th>
                        <th>{{ trans('adminbsb.action') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('adminbsb.user_name') }}</th>
                        <th>{{ trans('adminbsb.email') }}</th>
                        <th>{{ trans('adminbsb.address') }}</th>
                        <th>{{ trans('adminbsb.user_status') }}</th>
                        <th>{{ trans('adminbsb.last_updated_at') }}</th>
                        <th>{{ trans('adminbsb.last_updated_by') }}</th>
                        <th>{{ trans('adminbsb.action') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td class="align-center">{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->address }}
                                @isset ($user->district) - {{ $user->district->type }} {{ $user->district->name }} @endisset
                                @isset ($user->province) - {{ $user->province->name }} @endisset
                            </td>
                            <td class="align-center">
                                @include('adminbsb.partials.button_status', ['statusOf' => 'user', 'status' => $user->status, 'id' => $user->user_id])
                            </td>
                            @php($arrDatetime = separateDatetime($user->updated_at))
                            <td class="align-center">{{ $arrDatetime[0] }}<br/>{{ $arrDatetime[1] }}</td>
                            <td class="align-center">
                                @php($userId = $user->updated_by == 0 ? $user->created_by : $user->updated_by)
                                {{ getUser($userId)->name }}
                            </td>
                            <td class="align-center">
                                <a class="btn btn-xs btn-info waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$user->user_id) }}">{{ trans('adminbsb.btn_view') }}</a>
                                <a class="btn btn-xs btn-warning waves-effect" href="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$user->user_id.'/edit') }}">{{ trans('adminbsb.btn_edit') }}</a>
                                <button class="btn btn-xs btn-danger waves-effect btnDelete" data-action="{{ url(BULK_SYSTEM.'/'.$controller.'/'.$user->user_id) }}">{{ trans('adminbsb.btn_delete') }}</button>
                                <a class="btn btn-xs bg-indigo waves-effect btnChangePassword" data-id="{{ $user->user_id }}" href="#">{{ trans('adminbsb.btn_change_password') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    {{ $users->appends(request()->query())->links('adminbsb.partials.pagination') }}

                    @include('adminbsb.partials.frm_delete')
                    @include('adminbsb.partials.modal', ['module' => 'user'])
                </div>
            @endif
        </div>
    </div>
@endsection