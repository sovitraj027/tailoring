@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  /> --}}
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="row">

        <div class="col-lg-12 layout-spacing layout-top-spacing px-5">
            <div class="row layout-spacing">

                <div class="col-lg-12">

                    <x-bread-crumb model="Design"></x-bread-crumb>

                    <div class="statbox widget box box-shadow">

                        {{-- <x-widget-header model="Design" createRoute="{{route('createDesign',$id)}}"></x-widget-header> --}}

                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-striped" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="checkbox-column">SN</th>
                                       <th>Name</th>     
                                       <th>Email</th>   
                                       <th>status</th>                   
                     
                                    </tr>
                                    </thead>
                                    <tbody>

                                     @forelse ($customers as $customer)   
                                        <tr>
                                            <td class="checkbox-column">
                                                {{$loop->iteration}}
                                            </td>
                                       
                                            <td>{{$customer->name}}</td>
                                            <td>{{$customer->email}}</td>

                                                @if($customer->status==1)
                                                <td>
                                                    <a href="{{route('customer.reject',$customer->id)}}"
                                                        class="btn btn-sm btn-danger" >Reject</a>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="{{route('customer.accept',$customer->id)}}"
                                                        class="btn btn-sm btn-success" >Accept</a>
                                                </td>
                                            @endif
                                        
                                          
                                        </tr>
                                 
                                        @empty
                                        <tr>
                                            <td> No Record Found !!</td>
                                        </tr>
                                    @endforelse
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('inlinejs')
    @include('scripts.data_table_script')
    <script>

    </script>
    
    
    


@endpush


