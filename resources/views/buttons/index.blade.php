@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-12">  
            @if(session()->get('success'))    
            <div class="alert alert-success">      
                {{ session()->get('success') }}      
            </div>  
            @endif
        </div>

        <h1 class="display-3">Buttons</h1>
        <div>
            <a style="margin: 19px;" href="{{ route('buttons.create')}}" class="btn btn-primary">New button</a>
        </div>
        @foreach(array_chunk($buttons->all(), 3) as $butt)

        <div class="row">
            @foreach($butt as $key => $value)
            <?php
            $button = json_decode($value);
            if ($button->color && $button->color == 'white') {
                $style = 'color:000;';
            } else {
                $style = 'color:fff;';
            }
            if ($button->link && $button->color) {
                $link = 'javascript:location.href="' . $button->link . '"';
            } else {
                $link = 'javascript:location.href="' . route('buttons.edit', $button->id) . '"';
            }
            ?>
            <div class="col-sm-4">
                <form action="{{ route('buttons.destroy', $button->id)}}" method="post">
                    <button type="button" id="button{{ $button->id }}" class="btn" style="{{$style}}; background-color: {{$button->color}}" onclick="{{$link}}">{{$button->value}}</button>
                    | 
                    <a href="{{ route('buttons.edit',$button->id)}}" class="btn btn-primary">Edit</a> 
                
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }} 
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
            @endforeach
        </div>
        @endforeach


        @endsection
    </div>
</div>