@extends('layouts.app')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/mobiscroll.javascript.min.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="card bg-warning">
                    <div class="card-body">
                        <h4 class="card-title">{{ $habbit->title }}</h4>
{{--                        TODO diffForHumans Lokalizsyon --}}
                        <p>Başlama Tarihi: {{ $habbit->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="card-title">Bugün için bir gönderi ekle</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('habbit.update', $habbit) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-control">
                                <div class="custom-control custom-checkbox">
                                    <input name="check_date" type="checkbox" class="custom-control-input" id="checkDate">
                                    <label class="custom-control-label h5" for="checkDate" >Bugünü işaretle : {{ now()->toDateString() }}</label>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <label for="data" class="h4">Neler yaptığınızı anlatabilirsiniz</label>
                                <textarea type="text" name="data" id="data" class="form-control form-post-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-warning" type="submit">Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
                @foreach($habbit->habbit_dates as $date)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h4 class="card-title">{{ $date->check_date }}</h4>
                            <p>{{ $date->checked ? 'Yapıldı' : 'Yapılmadı'  }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-5">
{{--                <div class="mbsc-col-sm-12 mbsc-col-md-4">--}}
{{--                    <div class="mbsc-form-group">--}}
{{--                        <div class="mbsc-form-group-title">Max days</div>--}}
{{--                        <div id="demo-max-days"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection

@section('footer')
{{--    <script src="{{ asset('js/mobiscroll.javascript.min.js') }}"></script>--}}
{{--    <script>--}}
{{--        mobiscroll.calendar('#demo-max-days', {--}}
{{--            display: 'inline',               // Specify display mode like: display: 'bottom' or omit setting to use default--}}
{{--            select: 1,                       // More info about select: https://docs.mobiscroll.com/4-6-3/javascript/calendar#opt-select--}}
{{--            headerText: 'Pick up to 5 days',--}}
{{--            theme: 'ios'// More info about headerText: https://docs.mobiscroll.com/4-6-3/javascript/calendar#opt-headerText--}}
{{--        });--}}
{{--    </script>--}}
@endsection