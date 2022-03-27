@extends('layouts.main')

@section('content')
   


    <!-- BEGIN: General Report -->
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
               DashBoard
            </h2>
            <a href="" class="ml-auto flex items-center text-theme-30 dark:text-theme-25"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
        </div>  


        {{-- Search  form   --}}
        <div class="intro-y  mt-8">
                <form action="">
                        <div class="inline-block mr-3" style="width: 49%">
                            <input type="search" class="form-control py-2"  placeholder="Search  Email">
                        </div>
                        
                        <div class="inline-block">
                            <button type="submit" class="btn  btn-primary px-8 ml-3">Search</button> 
                        </div>
                </form>  
        </div>

        
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-feather="shopping-cart" class="report-box__icon text-theme-24 dark:text-theme-25"></i> 
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-theme-20 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                            </div>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">10</div>
                        <div class="text-base text-gray-600 mt-1">Weekly  Post</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-feather="credit-card" class="report-box__icon text-theme-29"></i> 
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-theme-21 tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-feather="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                            </div>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">12</div>
                        <div class="text-base text-gray-600 mt-1">Monthly  Post</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-feather="monitor" class="report-box__icon text-theme-15"></i> 
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-theme-20 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                            </div>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">28</div>
                        <div class="text-base text-gray-600 mt-1">Yearly  Post</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-feather="user" class="report-box__icon text-theme-20"></i> 
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-theme-20 tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                            </div>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">152.040</div>
                        <div class="text-base text-gray-600 mt-1">T</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: General Report -->


     
    
    <!-- BEGIN: HTML Table Data -->
    <h2 class="text-lg font-medium truncate mr-5 mt-20">
        Data Table
     </h2>
     {{-- <div class="intro-y box p-5 mt-8">
        <div class="overflow-x-auto scrollbar-hidden">
            <div class="mt-5 table-report table-report--tabulator">
                <table id="datatable" class='display dataTable'>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date  Time(when Created)</th>     
                        </tr>
                        <tr>
                            <th>Resource  Controller</th>
                            <th>Tutorials</th>
                            <th>Active</th>
                            <th>24-03-2022</th>     
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> --}}
    <!-- END: HTML Table Data -->


    <div class="w-4/4 mx-auto align-middle mt-8 border p-8 rounded">
        <div class="w-2/4  ">
            <input type="text" class="form-control" id="search" placeholder=" search  ">
        </div>




        <table class="table border-collapse">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First_name</th>
                    <th>Last_name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody class="all-data">
                @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id}} </td>
                            <td>{{ $user->first_name." ".$user->last_name }} </td>
                            <td>{{ $user->last_name }} </td>
                            <td>{{ $user->email }} </td>
                            <td>{{ $user->role }} </td>
                        </tr>
                @endforeach

            </tbody>
        </table>


       
        <div id="search_list" class="search-data" style="background-color:rgb(82, 196, 110);color:white">

        </div>


   </div>



     @section('script')
    <script>

        $(document).ready(function(){
           
            $('#search').on('keyup',function(){

                var query =  $(this).val();
                if(query){
                    $('.all-data').hide();
                    $('.search-data').show();
                }
                else{
                    $('.all-data').show();
                    $('.search-data').hide();
                }


                $.ajax({
                    url:"search",
                    type:"GET",
                    data:{'search':query},
                    
                    success:function(data){
                        $('#search_list').html(data);
                    }

                });
            });

        });
    
    </script>
@endsection



@endsection
