<div class="widget-header">
    @isset($createRoute)
        <div class="row d-flex justify-content-between px-5 pt-2">
            <h3 class="mt-3">{{$model}} List</h3>
            <a class="btn btn-sm btn-primary float-right mt-4" href="{{$createRoute}}">
                Add New {{$model}}
            </a>
        </div>
    @else
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>{{$item}} {{$model}}</h4>
            </div>
        </div>
    @endisset
</div>
