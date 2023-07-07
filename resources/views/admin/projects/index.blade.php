@extends('admin.layouts.base')

@section('contents')

@if (session('delete_success'))
@php
    $project = session('delete_success')
@endphp
<div class="alert alert-danger">
    "{{ $project->title }}" has been deleted!!
    {{-- <form action="{{ route("admin.project.restore", ['project' => $project] )}}" method="post">
        @csrf
        <button class="btn btn-warning">Restore</button>
    </form> --}}
</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Languages</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <th scope="row">{{ $project->title }}</th>
                <td>{{ $project->author }}</td>
                <td>{{ $project->languages }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.project.show', ['project' => $project]) }}">View</a>
                    <a class="btn btn-warning" href="{{ route('admin.project.edit', ['project' => $project]) }}">Edit</a>
                    <form
                        action="{{ route('admin.project.destroy', ['project' => $project]) }}"
                        method="post"
                        class="d-inline-block"
                    >
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary" href="{{ route('admin.project.create') }}">New</a>
{{ $projects->links() }}
@endsection