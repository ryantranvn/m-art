<div class="col-sm-4">
	<div class="dataTables_info" role="status" aria-live="polite">
        {{ trans('adminbsb.paging_total') }}
        <strong>{{ $paginator->total() }}</strong>
        {{ trans('adminbsb.paging_entries') }}
    </div>
</div>
<div class="col-sm-8">
    @if ($paginator->hasPages())
        <div class="dataTables_paginate paging_simple_numbers">
            <nav>
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                    <li class="disabled">
                        <a href="javascript:void(0);">
                            <i class="material-icons">keyboard_arrow_left</i>
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}">
                            <i class="material-icons">keyboard_arrow_left</i>
                        </a>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active"><a href="javascript:void(0);">{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $url }}" class="waves-effect">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" class="waves-effect">
                            <i class="material-icons">keyboard_arrow_right</i>
                        </a>
                    </li>
                    @else
                    <li class="disabled">
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="material-icons">keyboard_arrow_right</i>
                        </a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif
</div>