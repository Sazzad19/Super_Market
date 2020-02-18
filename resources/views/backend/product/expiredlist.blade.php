@extends('backend.layouts.master')
@section('title')
    Product Listing Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
      <?php $today= Carbon\Carbon::now();  ?>
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Expiry Date wise List</h3>
                </div>

            </div>
            <div class="clearfix"></div>
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    {{ Session::get('error_message') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Less than 7 days left</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="categorytable1">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Category Name</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>stock</th>
                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>status</th>
                                    <th>created_by</th>
                                    <th>modified_by</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $l=1 ?>
                                @foreach($product as $pc)


  @if((Carbon\Carbon::parse($pc->expiry_date)->diffInDays(Carbon\Carbon::now()) <= 6) && (Carbon\Carbon::parse($pc->expiry_date)->gt(Carbon\Carbon::now())))
                                    <tr>
                                        <th> {{$l++}}</th>
                                        <td>{{$pc->n}} </td>
                                        <td>{{$pc->name}} </td>
                                        <td>{{$pc->code}} </td>
                                        <td> {{$pc->quantity}}</td>
                                        <td> {{$pc->stock}}</td>
                                        <td> {{$pc->price}}</td>
                                        <td> {{$pc->expiry_date}}</td>
                                        <td>
                                            @if($pc->status == 1)
                                                <span class="label label-success"> Active </span>
                                            @else
                                                <span class="label label-danger">DeActive</span>
                                            @endif
                                        </td>
                                        <td> {{$pc->created_by}}</td>
                                        <td> {{$pc->modified_by}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{route('product.edit',$pc->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{route('product.delete' ,$pc->id)}}" method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field()}}
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete?')" ><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{route('stock.edit',$pc->id)}}" class="btn btn-info"><i class="fa fa-plus"></i> Stock Update</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>3 Months left</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="categorytable2">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Category Name</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>stock</th>
                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>status</th>
                                    <th>created_by</th>
                                    <th>modified_by</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $l=1 ?>
                                @foreach($product as $pc)


                                @if((Carbon\Carbon::parse($pc->expiry_date)->diffInMonths(Carbon\Carbon::now()) == 2) && (Carbon\Carbon::parse($pc->expiry_date)->gt(Carbon\Carbon::now())))

                                    <tr>
                                        <th> {{$l++}}</th>
                                        <td>{{$pc->n}} </td>
                                        <td>{{$pc->name}} </td>
                                        <td>{{$pc->code}} </td>
                                        <td> {{$pc->quantity}}</td>
                                        <td> {{$pc->stock}}</td>
                                        <td> {{$pc->price}}</td>
                                        <td> {{$pc->expiry_date}}</td>
                                        <td>
                                            @if($pc->status == 1)
                                                <span class="label label-success"> Active </span>
                                            @else
                                                <span class="label label-danger">DeActive</span>
                                            @endif
                                        </td>
                                        <td> {{$pc->created_by}}</td>
                                        <td> {{$pc->modified_by}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{route('product.edit',$pc->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{route('product.delete' ,$pc->id)}}" method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field()}}
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete?')" ><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{route('stock.edit',$pc->id)}}" class="btn btn-info"><i class="fa fa-plus"></i> Stock Update</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>6 Months left</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="categorytable3">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Category Name</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>stock</th>
                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>status</th>
                                    <th>created_by</th>
                                    <th>modified_by</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $l=1 ?>
                                @foreach($product as $pc)


                                @if((Carbon\Carbon::parse($pc->expiry_date)->diffInMonths(Carbon\Carbon::now()) == 5) && (Carbon\Carbon::parse($pc->expiry_date)->gt(Carbon\Carbon::now())))

                                    <tr>
                                        <th> {{$l++}}</th>
                                        <td>{{$pc->n}} </td>
                                        <td>{{$pc->name}} </td>
                                        <td>{{$pc->code}} </td>
                                        <td> {{$pc->quantity}}</td>
                                        <td> {{$pc->stock}}</td>
                                        <td> {{$pc->price}}</td>
                                        <td> {{$pc->expiry_date}}</td>
                                        <td>
                                            @if($pc->status == 1)
                                                <span class="label label-success"> Active </span>
                                            @else
                                                <span class="label label-danger">DeActive</span>
                                            @endif
                                        </td>
                                        <td> {{$pc->created_by}}</td>
                                        <td> {{$pc->modified_by}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{route('product.edit',$pc->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                </div>
                                                <div class="col-md-2">
                                                    <form action="{{route('product.delete' ,$pc->id)}}" method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field()}}
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete?')" ><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{route('stock.edit',$pc->id)}}" class="btn btn-info"><i class="fa fa-plus"></i> Stock Update</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- /page content -->
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('backend/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#categorytable1').DataTable();
              $('#categorytable2').DataTable();
                $('#categorytable3').DataTable();
        } );
    </script>
@endsection
