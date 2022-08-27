@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Books List
                <a href="{{ route('bookslist.create') }}" class="btn btn-sm btn-success" style="float:right;">Load Book Data</a>
                </div>
                <br>
                <div class="panel-body">
                   
                  @if (!empty($booklist) && $booklist->count())
                  @php $slno=1; @endphp
                        <table class="table table-bordered">
                            <tr>
                                <th>SL No.</th>
                                <th>Book Title</th>
                                <th>Book SubTitle</th>
                                <th>Book Authors</th>
                                <th>Book Thumnail</th>
                            
                            </tr>
                            @foreach($booklist as $key => $val)
                            <tr>
                                <td>{{ $slno++ }}
                                <td>{{ $val->title }}</td>
                                <td>{{ $val->subtitle }}</td>
                                <td>{{ $val->authors }}</td>
                                <td><img src="{{ $val->smallThumbnail }}" ></td>
                                
                            </tr>

                            @endforeach

                        </table>
                       {!! $booklist->links() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection