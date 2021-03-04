@extends('rolelayout')
@section('content')
    <h1>Show Manage Role</h1>
    <form action="{{ '/role/' . $role['id'] }}" method="POST" >
        <fieldset disabled="disabled">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ $role->name }}" class="form-control" placeholder="Enter Name">
            </div>

            <label>select permission</label>
                @foreach ($permission as $item)<br/>
                    <input type="checkbox" name="permission[]" value="{{ $item->id }}"  
                    @foreach ($rolePermissions as $value)
                    
                        @if ($item->id === $value) checked @endif
                    @endforeach
                    >{{ $item->name }}
                @endforeach<br/>

           
        </fieldset>
    </form>
@endsection