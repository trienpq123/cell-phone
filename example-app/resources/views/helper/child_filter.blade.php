{{-- @php
    echo($child_filter);
@endphp --}}
@php
    $chuoi = "";
    if($step) {
        for($i=0;$i<$step;$i++){
            $chuoi.="-";
        }
    }
    $step = $step + 3;
@endphp
<option value="{{$child_filter->filter_id}}">{{$chuoi.$child_filter->filter_name}}</option>

    @foreach ($child_filter->filter as $item)
        @include('helper.child_filter', ['child_filter' => $item,'step' => $step])
    @endforeach
