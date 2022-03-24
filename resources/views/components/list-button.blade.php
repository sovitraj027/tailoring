@if(isset($routeShow))
    <a href="{{$routeShow}}" class="text-primary bs-tooltip text-info show" data-toggle="tooltip" data-placement="top" data-original-title="View">
        <i class="far fa-eye"></i>
    </a>
@endif


<form action="{{$routeDestroy}}"
      method="POST" class="d-inline bs-tooltip" data-toggle="tooltip" data-placement="top" title=""
      data-original-title="Delete">
    @csrf
    @method('Delete')

    <button class="text-danger delete-btn delete"
            onclick="return confirm('Are you sure you want to delete this item?');"
            type="submit" title="Delete">
        <i class="far fa-trash-alt mr-2"></i>
    </button>
</form>

<a href="{{$routeEdit}}" class="bs-tooltip text-info edit" data-toggle="tooltip" data-placement="top" title=""
   data-original-title="Edit">
    <i class="far fa-edit"></i>
</a>
{{-- <a href="{{$addDesign}}" class="bs-tooltip text-info edit" data-toggle="tooltip" data-placement="top" title=""
   data-original-title="Edit">
    <i class="far fa-cut"></i>
</a> --}}
