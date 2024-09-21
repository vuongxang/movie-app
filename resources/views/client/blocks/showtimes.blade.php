@foreach($cinemas as $cinema)
    <div class="cinema">
        <h3>{{ $cinema->name }}</h3>
        <div class="halls">
            @foreach($cinema->halls as $hall)
                <div class="hall mb-3">
                    <p>{{ $hall->name }}</p>
                    <div class="showtimes btn-group flex-wrap">
                        @foreach($hall->showtimes as $showtime)
                            <a href="{{ route('showtime.seatSelection', ['showtime_id' => $showtime->id]) }}" class="btn btn-outline-primary select-showtime">
                                {{ $showtime->show_time }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
