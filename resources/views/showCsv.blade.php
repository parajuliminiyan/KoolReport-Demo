@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="card ">
                    <div class="card-header">
                        Upload Csv
                    </div>
                  <div class="card-body">
                      <div class="col-md-6">
                          <form action="{{route('parseCsv')}}" class="form" method="post" enctype="multipart/form-data">
                              {{csrf_field()}}
                              @if (Session::has('message'))

                                  {!! Session::get('message')  !!}


                              @endif
                              <label for="csvImport" class="control-label">Choose Csv File</label>
                              <input type="file" name="csv_file" class="form-control" required>
                              <br>
                              <button type="submit" class="btn btn-info">Upload</button>
                          </form>
                      </div>

                  </div>
              </div>
          </div>
        </div>
    </div>


@endsection
