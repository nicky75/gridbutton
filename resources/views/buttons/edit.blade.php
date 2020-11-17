@extends('base') @section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a button</h1>
        @if ($errors->any())        
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)                
                <li>{{ $error }}</li>
                @endforeach            
            </ul>
        </div>
        <br />         
        @endif        
        <form method="post" action="{{ route('buttons.update', $button->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}            
            <div class="form-group">
                <label for="value">Value:</label>
                <input type="text" class="form-control" name="value" value={{ $button->value }} />            
            </div>
            <div class="form-group">
                <label for="value">Color:</label>
                <input type="text" class="form-control" name="color" value={{ $button->color }} />            
            </div>
            <div class="form-group">
                <label for="value">Link:</label>
                <input type="text" class="form-control" name="link" value={{ $button->link }} />            
            </div>
            <button type="submit" class="btn btn-primary">Update</button>        
        </form>
    </div>
</div>
@endsection