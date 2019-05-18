@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card bg-danger  text-white">
                    <div class="card-header">
                        <h2 class="card-title">Uzmanlık : {{ $expertness->title }}</h2>
                        <p class="card-text">Çalışma Süreniz: {{ $expertness->totalTime }}</p>
                        <strong> Etiketler:
                        @foreach($expertness->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                        </strong>
                    </div>
                    <div class="card-body">
                        <h4>Gönderiler</h4>
                        <ol>
                        @foreach($expertness->posts() as $post)
                            <li> <h4>Çalıştığı Saat {{ $post->workout_hour }}</h4>
                                <p class="lead">{{ $post->data }}</p>
                            </li>
                        @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <form class="form-time" action="{{ route('expertness.update', $expertness) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="hour">Çalıştığım Süre (Saat)</label>
                        <input type="text" name="hour" id="hour" class="form-control form-time-control">
                    </div>

                    <div class="form-group">
                        <label for="data">Neler yaptığınızı anlatabilirsiniz</label>
                        <textarea type="text" name="data" id="data" class="form-control form-post-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-warning" type="submit">Kaydet</button>
                    </div>
                </form>
{{--                <div class="countup" id="countup1">--}}
{{--                    <span class="timeel days">00</span>--}}
{{--                    <span class="timeel timeRefDays">gün</span>--}}
{{--                    <span class="timeel hours">00</span>--}}
{{--                    <span class="timeel timeRefHours">saat</span>--}}
{{--                    <span class="timeel minutes">00</span>--}}
{{--                    <span class="timeel timeRefMinutes">dakika</span>--}}
{{--                    <span class="timeel seconds">00</span>--}}
{{--                    <span class="timeel timeRefSeconds">saniye</span>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="col-6">--}}
{{--                        <a href="#" id="countStart" class="btn btn-block btn-warning">Başla</a>--}}
{{--                    </div>--}}
{{--                    <div class="col-6">--}}
{{--                        <a href="#" class="btn btn-block btn-danger">Durdur</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

@endsection

@section('footer')
{{--    <script>--}}
{{--        window.onload = function() {--}}
{{--            document.getElementById('countStart').addEventListener("click", countUpFromTime(new Date(), 'countup1'));--}}
{{--        };--}}

{{--        function countUpFromTime(countFrom, id) {--}}

{{--            countFrom = countFrom.getTime();--}}

{{--            var now = new Date(),--}}
{{--                countFrom = new Date(countFrom),--}}
{{--                timeDifference = (now - countFrom);--}}

{{--            var secondsInADay = 60 * 60 * 1000 * 24,--}}
{{--                secondsInAHour = 60 * 60 * 1000;--}}

{{--            days = Math.floor(timeDifference / (secondsInADay) * 1);--}}
{{--            hours = Math.floor((timeDifference % (secondsInADay)) / (secondsInAHour) * 1);--}}
{{--            mins = Math.floor(((timeDifference % (secondsInADay)) % (secondsInAHour)) / (60 * 1000) * 1);--}}
{{--            secs = Math.floor((((timeDifference % (secondsInADay)) % (secondsInAHour)) % (60 * 1000)) / 1000 * 1);--}}

{{--            var idEl = document.getElementById(id);--}}
{{--            idEl.getElementsByClassName('days')[0].innerHTML = days;--}}
{{--            idEl.getElementsByClassName('hours')[0].innerHTML = hours;--}}
{{--            idEl.getElementsByClassName('minutes')[0].innerHTML = mins;--}}
{{--            idEl.getElementsByClassName('seconds')[0].innerHTML = secs;--}}

{{--            clearTimeout(countUpFromTime.interval);--}}
{{--            countUpFromTime.interval = setTimeout(function(){ countUpFromTime(countFrom, id); }, 1000);--}}
{{--        };--}}
{{--    </script>--}}
@endsection