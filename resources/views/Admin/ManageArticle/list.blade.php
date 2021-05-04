@extends('Admin.Layout.app')
@section('title', 'Manage'.' '.$label.'s')
@section('content')

<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-10 text-white p-t-40 p-b-90">

                    <h4 class="">
                        Manage {{ ucfirst($label) }}s
                    </h4>
                </div>
                <div class="col-2 text-white p-t-40 p-b-90">
                    <a href="{{url('/admin/manage-article/add')}}" class="add_record">Add Article</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container  pull-up">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive p-t-10">
                            <table id="example" class="table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($article_list as $key=>$article)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ ucfirst($article['title']) }}</td>
                                        <td>
                                            <a href="{{ url('admin/manage-article/edit/'.$article['id']) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('admin/manage-article/delete/'.$article['id']) }}" class="del_btn" title="Delete"><i class="fa fa-trash"></i></a>

                                        </td>
                                        
                                    </tr>
                                    @empty
                                        <tr>
                                            <td>No data Found!</td>
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
</section>

@endsection()