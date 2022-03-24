@push('inlinecss')
    <link href="{{asset('assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css"/>
@endpush

<nav class="breadcrumb-two mb-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item {{ !isset($item) ? 'active' : ''}}" aria-current="page"><a href="{{isset($listRoute) ? $listRoute : 'javascript::void(0)'}}">{{$model}}</a></li>

        @if(isset($item))
            <li class="breadcrumb-item active" ><a href="javascript:void(0);">{{$item}} {{$model}}</a></li>
        @endif
    </ol>
</nav>

