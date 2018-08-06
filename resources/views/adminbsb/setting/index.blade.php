@extends('adminbsb.partials.sub_layout')

@section('action')
    <div class="row">
        <div class="col-sm-12">
                <table class="table table-striped table-bordered tableResize">
                    <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th data-sort="name" class="sorting">{{ trans('adminbsb.setting') }}</th>
                        <th>{{ trans('adminbsb.action') }}</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('adminbsb.setting') }}</th>
                        <th>{{ trans('adminbsb.action') }}</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td class="align-center">1</td>
                            <td></td>
                            <td class="align-center">

                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
@endsection