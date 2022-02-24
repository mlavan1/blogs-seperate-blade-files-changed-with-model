@extends('blogs.layout')
 
@section('content')

{{-- Category Registration Part --}}


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Categories</h2>
            </div>

            {{-- <div class="container">
                <h2>Modal Example</h2>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
              
                <!-- Modal -->
                
                
            </div> --}}
              

            <div class="pull-right">
                <a class="btn btn-success" href="" data-toggle="modal" data-target="#myModal"> Create new Category</a>
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-md">

                        {{-- Model Content --}}

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create Category</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Warning!</strong> Please check your input code<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('blogs.store') }}" method="POST">
                                    @csrf
                                        <input type="text" name="category_name" class="form-control" placeholder="Category Name">
                                        <br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th width="300px">Category Name</th>     
                <th width="10px">Action</th>
            </tr>
        </thead>
        {{-- <tfoot>
            <tr>
                <th>No</th>
                <th>Category Name</th>     
                <th>Action</th>
            </tr>
        </tfoot> --}}
        <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $blog->category_name }}</td>
            <td>
                <form action="/blogs" id="edit-action" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <a class="btn btn-info" href="">Edit</a>
                <div class="modal fade" id="edit-modal" role="dialog">
                    <div class="modal-dialog modal-md">
                    
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Category Name</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                {{ $blog->id }}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <a class="btn btn-danger" href="">Delete</a>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
  
    {!! $blogs->links() !!}
      
{{-- Book Registration part --}}

    <br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Insert Book Details</h2>
            </div>
        </div>
    </div>
   
    {{-- @if ($message1 = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message1 }}</p>
        </div>
    @endif --}}
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Name</strong>
                <input type="text" name="book_name" class="form-control" placeholder="Book Name"><br>
                <strong>Category</strong>
                <input type="text" name="book_category" class="form-control" placeholder="Book Category"><br>
                <strong>Author</strong>
                <input type="text" name="book_author" class="form-control" placeholder="Book Author"><br>
                <strong>Price</strong>
                <input type="text" name="book_price" class="form-control" placeholder="Book Price"><br>
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  
    {!! $blogs->links() !!}
      
@endsection