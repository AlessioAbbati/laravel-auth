@extends('admin.layouts.base')

@section('contents')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Image</th>
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
                    <a class="btn btn-primary" href="{{ route('admin.project.show', ['project' => $project->id]) }}">View</a>
                    <a class="btn btn-warning" href="{{ route('admin.project.edit', ['project' => $project->id]) }}">Edit</a>
                    <form
                        action="{{ route('admin.project.destroy', ['project' => $project->id]) }}"
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

{{ $projects->links() }}
@endsection