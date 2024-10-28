@extends('admin.layouts.app')
<style type="text/css">


.p-wrap {
  max-width: 900px;
  word-wrap: break-word;
  white-space: pre-wrap;
  font-size: 16px;
}

</style>
@section('content')

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-black d-inline-block mb-0">Contact Us</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('category') }}">Contact Us</a></li>
                                <li class="breadcrumb-item">List</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('category.add') }}" class="btn btn-lg btn-neutral fade-class"><i class="fas fa-plus fa-lg"></i> New</a>
                        {{--                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="container-fluid mt--6 mb--1">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-3">Filter</h3>
                        <form action="{{ route('category') }}">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <input type="text" name="name" id="name" value="{{ request()->name }}" class="form-control form-control-alternative" placeholder="Search..." autofocus>
                                </div>
                                <div class="col-md-3 form-group">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                                    <a href="{{ route('category') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid ">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->

                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Name</th>
                                <th scope="col" class="sort" data-sort="name">Email</th>
                                <th scope="col" class="sort" data-sort="parent_id">subject</th>
                                <th scope="col" class="sort" data-sort="status">Messege</th>
                            </tr>
                            </thead>
                            <tbody class="list">

                            @forelse($records as $key => $value)
                                <tr>
                                    <td class="budget">{{ $value->name }}</td>
                                    <td class="budget">{{ $value->email }}</td>
                                    <td class="budget">{{ $value->subject }}</td>
                                    <td class="budget" >
                                      <p class="p-wrap">{{ $value->message }}</p>
</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="budget">
                                        No Record Found
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        {{ $records->appends(['name' => request()->name])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script>
        $(document).on('click','.deleteData',function(){
            let alertMessage = "Are You Sure,Child Contact Us will be delete If it Parent"
            let routeUrl = $(this).data('url')
            deleteData(alertMessage, routeUrl)
        })
    </script>
@endpush