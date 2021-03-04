@extends('rolelayout')
@section('content')
    <h1>Edit Manage Role</h1>
    <form action="{{ '/role/' . $data['id'] }}" method="POST" >
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Enter Name">
        </div>


        <label>select permission</label>
            @foreach ($permission as $item)<br/>
                <input type="checkbox" name="permission[]" value="{{ $item->id }}"  
                @foreach ($rolePermissions as $value)
                 
                    @if ($item->id === $value) checked @endif
                 @endforeach
                 >{{ $item->name }}
            @endforeach<br/>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection