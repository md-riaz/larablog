@extends('layouts.manage')
@section('title' ,'User roles')
@section('stylesheet')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
@stop
@section('content')
    <style>
        .ms-drop input[type="checkbox"] {
            width: auto;
        }
    </style>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Define user role
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                @csrf

                <!-- Multiple Select -->
                    <div class="form-group">
                        <select multiple="multiple"
                                placeholder="Select a role"
                                data-display-delimiter=" | "
                                data-show-clear="true" data-animate='slide'>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script>
        $(function () {
            $('select').multipleSelect()
        })
    </script>
@stop
