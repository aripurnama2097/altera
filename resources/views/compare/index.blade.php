@extends('layouts.main')


@section('container')




        @foreach ($data1 as $d1) 
            @foreach ($data2 as $d2) 
                @if ($d1->column1 == $d2->column1 && $d1->column2 == $d2->column2) 
                    
                @endif
                
                @else 
                
                @endif
            @endforeach
        @endforeach
@endsection