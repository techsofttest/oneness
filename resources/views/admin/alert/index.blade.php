@extends('adminlte::page')

@section('title', 'View Course Alerts')

@section('content_header')
    <h1>Course Alerts</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {{-- Success message --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Add new alert --}}
        <a href="{{ route('admin.alert.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus-circle"></i> Add New Alert
        </a>

        {{-- Alerts table --}}
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Alert Message</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($alerts as $alert)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alert->message }}</td>
                        <td>
                            @if($alert->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $alert->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No alerts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $alerts->links() }}
        </div>
    </div>
</div>
@stop
