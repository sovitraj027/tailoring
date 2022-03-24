@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-12 layout-spacing layout-top-spacing px-5">
            <div class="row layout-spacing">

                <div class="col-lg-12">

                    <x-bread-crumb model="Cloth"></x-bread-crumb>

                    <div class="statbox widget box box-shadow">

                        
                            <x-widget-header model="Cloth" createRoute="{{route('clothes.create')}}"></x-widget-header>
                     
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="zero-config" class="table table-striped" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="checkbox-column">SN</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Cloth Type</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($clothes as $cloth)
                                        <tr>
                                            <td class="checkbox-column">
                                                {{$loop->iteration}}
                                            </td>
                                            <td>{{ \Illuminate\Support\Str::limit($cloth->name, 15, '...') }}</td>
                                            <td><img src="/storage/cloth-image/{{ $cloth->image }}" width="100" height="50"></td>

                                            <td>{{$cloth->price}}</td>
                                           
                                            <td>{{$cloth->type}}</td>

                                            @if (auth()->user()->admin)
                                            <td class="text-center">
                       
                                                <x-list-button routeDestroy="{{route('clothes.destroy',$cloth->id)}}"
                                                               routeEdit="{{route('clothes.edit',$cloth->id)}}"
                                                               routeShow="{{route('clothes.show',$cloth->id)}}">
                                                        
                                                </x-list-button>
                                                <a href="{{route('viewDesign',$cloth->id)}}" type="button"
                                                    class="bs-tooltip text-info" data-toggle="tooltip" data-placement="top" data-original-title="Add">
                                                        <i class="fas fa-cut"></i>
                                              </a>
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
@endpush


