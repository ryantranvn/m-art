<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" {{--style="width: 600px !important; margin-left: -50px"--}}>
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">{{ BULK_SYSTEM_NAME }}</h4>
            </div>
            <div class="modal-body align-center">
                {{-- frmStatus --}}
                <form id="frmStatus" action="{{ url(API_URL.'/update-status-'.$module) }}" method="POST"  class="form-horizontal frmModal hide" role="form" novalidate="novalidate">
                    {{ csrf_field() }}
                    <input type="text" class="hiddenInput" name="id" />
                    <input type="text" class="hiddenInput" name="status" />
                    <div class="row">
                        <p class="align-center">{{ trans('adminbsb.modal_ask_change_status') }}</p>
                        @php($arrStatus = arrStatus($module))
                        @foreach ($arrStatus as $status)
                        <a href="#" class="btn {{ $status['color'] }} m-r-10" data-status="{{ $status['value'] }}">{{ $status['text'] }}</a>
                        @endforeach
                    </div>
                </form>

                @if ($module == 'user')
                {{-- frmChangePassword --}}
                <form id="frmChangePassword" action="{{ url(API_URL.'/update-password') }}" method="POST"  class="form-horizontal frmModal hide" role="form" novalidate="novalidate">
                    {{ csrf_field() }}
                    <input type="text" class="hiddenInput" name="id" />

                    <p class="align-center">{{ trans('adminbsb.modal_ask_change_password') }}</p>
                    <div class="row">
                        <div class="col-sm-12 align-left">
                            <label class="form-label">{{ trans('adminbsb.password') }} <span class="requireSign">(*)</span></label>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 align-left">
                            <label class="form-label">{{ trans('adminbsb.password_confirmation') }} <span class="requireSign">(*)</span></label>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="password_confirmation" class="form-control" value="" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 align-left">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon bg-blue btnGeneratePassword">{{ trans('adminbsb.generate_password') }}</span>
                                <div class="form-line">
                                    <input type="text" name="password_auto" class="form-control align-center text-uppercase" readonly autocomplete="off" />
                                </div>
                                <span class="input-group-addon hide btnClearAutoPassword"><i class="material-icons">close</i></span>
                            </div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{ trans('adminbsb.btn_close') }}</button>
                @if ($module == 'user')
                    <button type="button" class="btn btn-success waves-effect btnModalSubmit">{{ trans('adminbsb.btn_submit') }}</button>
                @endif
            </div>
        </div>
    </div>
</div>