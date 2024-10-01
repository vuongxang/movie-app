<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Đặt Vé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="select-date" class="font-weight-bold mb-2">Chọn ngày:</label>
                    <div class="date-selector d-flex flex-wrap">
                        @for ($i = 0; $i <= 30; $i++)
                            <button type="button" class="btn btn-outline-primary m-1 select-date rounded-pill" data-date="{{ \Carbon\Carbon::now()->addDays($i)->format('Y-m-d') }}">
                                {{ \Carbon\Carbon::now()->addDays($i)->format('d/m') }}
                            </button>
                        @endfor
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label for="select-city" class="font-weight-bold mb-2">Chọn tỉnh thành:</label>
                    <div class="city-selector d-flex">
                        <button type="button" class="btn btn-outline-primary mr-2 select-city rounded-pill" data-city="Hà Nội">Hà Nội</button>
                        <button type="button" class="btn btn-outline-primary mr-2 select-city rounded-pill" data-city="Đà Nẵng">Đà Nẵng</button>
                        <button type="button" class="btn btn-outline-primary select-city rounded-pill" data-city="Hồ Chí Minh">Hồ Chí Minh</button>
                    </div>
                </div>

                <div id="theater-schedule" class="mt-4">
                    <p class="text-muted">Chọn ngày và tỉnh để hiển thị các rạp và suất chiếu.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        let selectedDate = null;
        let selectedCity = null;
        let selectedShowtime = null;
        let movieId = null;

        $(document).on('click', '.btn-booking', function() {
            movieId = $(this).data('movie-id');
            console.log(movieId);
        });

        $('.select-date').on('click', function () {
            selectedDate = $(this).data('date');
            $('.select-date').removeClass('btn-primary').addClass('btn-outline-primary');
            $(this).removeClass('btn-outline-primary').addClass('btn-primary');
            updateTheaterSchedule();
        });

        $('.select-city').on('click', function () {
            selectedCity = $(this).data('city');
            $('.select-city').removeClass('btn-primary').addClass('btn-outline-primary');
            $(this).removeClass('btn-outline-primary').addClass('btn-primary');
            updateTheaterSchedule();
        });

        function updateTheaterSchedule() {
            if (selectedDate && selectedCity) {
                $.ajax({
                    url: '/get-showtimes',
                    method: 'GET',
                    data: {
                        date: selectedDate,
                        city: selectedCity,
                        movieId: movieId
                    },
                    success: function (data) {
                        $('#theater-schedule').html(data);
                    }
                });
            } else {
                $('#theater-schedule').html('<p class="text-muted">Chọn ngày và tỉnh để hiển thị các rạp và suất chiếu.</p>');
                $('#confirmBooking').prop('disabled', true);
            }
        }
    });
</script>
