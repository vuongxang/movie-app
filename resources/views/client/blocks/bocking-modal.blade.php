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
                <!-- Hàng 1: Hiển thị ngày -->
                <div class="form-group">
                    <label for="select-date">Chọn ngày:</label>
                    <div class="d-flex flex-wrap">
                        <!-- Loop qua các ngày -->
                        @for ($i = 0; $i <= 30; $i++)
                            <button type="button" class="btn btn-outline-primary m-1 select-date" data-date="{{ \Carbon\Carbon::now()->addDays($i)->format('Y-m-d') }}">
                                {{ \Carbon\Carbon::now()->addDays($i)->format('d/m') }}
                            </button>
                        @endfor
                    </div>
                </div>

                <!-- Hàng 2: Hiển thị tỉnh thành -->
                <div class="form-group">
                    <label for="select-city">Chọn tỉnh thành:</label>
                    <div class="d-flex">
                        <button type="button" class="btn btn-outline-primary m-1 select-city" data-city="Hà Nội">Hà Nội</button>
                        <button type="button" class="btn btn-outline-primary m-1 select-city" data-city="Đà Nẵng">Đà Nẵng</button>
                        <button type="button" class="btn btn-outline-primary m-1 select-city" data-city="Hồ Chí Minh">Hồ Chí Minh</button>
                    </div>
                </div>

                <!-- Hàng 3: Hiển thị rạp phim và suất chiếu -->
                <div id="theater-schedule">
                    <p>Chọn ngày và tỉnh để hiển thị các rạp và suất chiếu.</p>
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

        // Khi chọn ngày
        $('.select-date').on('click', function () {
            selectedDate = $(this).data('date');
            $('.select-date').removeClass('btn-primary').addClass('btn-outline-primary'); // Reset màu nút ngày
            $(this).removeClass('btn-outline-primary').addClass('btn-primary'); // Đổi màu nút đã chọn
            updateTheaterSchedule();
        });

        // Khi chọn tỉnh thành
        $('.select-city').on('click', function () {
            selectedCity = $(this).data('city');
            $('.select-city').removeClass('btn-primary').addClass('btn-outline-primary'); // Reset màu nút tỉnh
            $(this).removeClass('btn-outline-primary').addClass('btn-primary'); // Đổi màu nút đã chọn
            updateTheaterSchedule();
        });

        // Hàm cập nhật rạp và suất chiếu dựa trên ngày và tỉnh đã chọn
        function updateTheaterSchedule() {
            if (selectedDate && selectedCity) {
                // Gọi AJAX để lấy dữ liệu suất chiếu
                $.ajax({
                    url: '/get-showtimes', // Route Laravel để lấy dữ liệu suất chiếu
                    method: 'GET',
                    data: {
                        date: selectedDate,
                        city: selectedCity
                    },
                    success: function (data) {
                        $('#theater-schedule').html(data); // Cập nhật HTML của rạp và suất chiếu
                    }
                });
            } else {
                $('#theater-schedule').html('<p>Chọn ngày và tỉnh để hiển thị các rạp và suất chiếu.</p>');
                $('#confirmBooking').prop('disabled', true); // Tắt nút Xác Nhận nếu chưa chọn
            }
        }
    });


</script>
