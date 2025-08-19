@extends('adminlte::page')

@section('title', 'Add Alert')

@section('content_header')
    <h1>Add Blinking Course Alert</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {{-- Show validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.alert.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="message">Alert Message</label>
                    <input type="text" name="message" class="form-control" placeholder="Enter blinking alert message" required>
                </div>

                <div class="form-group">
                    <label for="status">
                        <input type="checkbox" name="status" id="status" checked>
                        Active
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Save Alert</button>
                <a href="{{ route('admin.alert.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@stop
