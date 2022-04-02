{{-- Home se ke thua view master --}}
@extends('layout.master')

{{-- section se thay doi
    phan yield trong master
    voi ten tuong ung --}}
@section('title', 'TinTuc page')

@section('content-title', 'TinTuc page')

@section('content')
    <div>
        <a href="{{route('categories.create')}}">
            <button class="btn btn-primary">Create</button>
        </a>
    </div>
    <table class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>products</th>
        </thead>
        <tbody>
            @foreach ($tintucs as $tintuc)
                <tr>
                    <td>{{ $tintuc->id }}</td>
                    <td>{{ $tintuc->name }}</td>
                    <td>{{ $tintuc->description ?: 'N/A' }}</td>
                    <td>{{ $tintuc->category->name }}</td>
                    <td><ul>
                        @foreach($tintuc->products as $p)
                            <li>{{$p->name}}</li>
                        @endforeach
                    </ul></td>
                    <td>
                        <a
                            href="{{route('tintuc.edit', $tintuc->id)}}"
                            class="btn btn-warning"
                        >Edit</a>
                        <form
                            action="{{route('tintuc.delete', $tintuc->id)}}"
                            method="POST"
                        >
                            @method('DELETE')
                            {{-- <input type="text" name="_method" value="DELETE"> --}}
                            @csrf
                            {{-- <input type="text" name="csrf_token" value="asdadasd"> --}}
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tintucs->links() }}
@endsection
