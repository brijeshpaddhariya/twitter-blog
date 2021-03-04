@extends('rolelayout')
@section('content')
    <h1>Show Manage User</h1>
    <form action="{{ '/users/' . $users['id'] }}" method="POST" >
        <fieldset disabled="disabled">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Enter Email">
            </div>

            {{-- <div class="form-group">
                <label>Role</label>
                <input type="password" name="password"  value="{{ $user->email }}" class="form-control" placeholder="Enter Password">
            </div> --}}
            <label>Select Role:</label>    
            <select class="ml-2" name="role[]" >
                @foreach ($roleName as $item)
                    <option >{{ $item->name }}</option>
                @endforeach
            </select>
            
        </fieldset>
    </form>
@endsection