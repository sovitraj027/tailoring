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
                                       <th>Address</th>   
                                       <th>contact</th>  
                                       <th>status</th>                   
                     
                                    </tr>
                                    </thead>
                                    <tbody>

                                     @forelse ($members as $member)   
                                        <tr>
                                            <td class="checkbox-column">
                                                {{$loop->iteration}}
                                            </td>
                                       
                                            <td>{{$member->name}}</td>
                                            <td>{{$member->address}}</td>
                                            <td>{{$member->mobile}}</td>
                                            <td>
                                                @if($member->status==1)
                                                <td>
                                                    <a href="{{route('membership.unverified',$member->id)}}"
                                                        class="btn btn-sm btn-danger" >Unverified</a>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="{{route('membership.verified',$member->id)}}"
                                                        class="btn btn-sm btn-success" >Verified</a>
                                                </td>
                                            @endif
                                           </td>
                                          
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
$(document).ready(function(){
    
  $("zero-config").DataTable()
 
}); 
$(function() {
   
        $('.toggle-class').change(function() {
            console.log('erhe')
        var status = $(this).prop('checked') == true ? 1 : 0;
        var member_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'status': status, 'member_id': member_id},
                success: function(data){
                    console.log('Success')
                },
                error: function (xhr) {
                   console.log(xhr.responseText); //saves alot of time during debugging
                }
            });
        
        });
    });
   

    //
    // $(function () {
    //         $('#zero-config').on('change', '.toggle-class', function () {
    //             var status = $(this).prop('checked') == true ? 1 : 0;
    //             var member_id = $(this).data('id');
    //             $.ajax({
    //                 type: 'GET',
    //                 datatype: "json",
    //                 url: "{{ url('/changeStatus') }}",
    //                 data: {'status': status, 'member_id': member_id},
    //                 success: function (data) {
    //                     console.log(data.success)
    //                 }
    //             })
    //         })
    //     })


    </script>
    
    
    


@endpush


