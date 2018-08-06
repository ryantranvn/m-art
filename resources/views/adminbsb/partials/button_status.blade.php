{{--
    $statusOf : name of module (user, category, ...)
    $status : current value of status
--}}
@foreach(arrStatus($statusOf) as $arrStatus)
    @if ($status == $arrStatus['value'])
    <button class="btn btn-xs {{ $arrStatus['color'] }} btnStatus" data-id="{{ $id }}">{{ $arrStatus['text'] }}</button>
    @endif
@endforeach

