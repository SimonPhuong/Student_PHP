<?php
ob_start();
include('includes/config.php');
?>
<div class="table-content table-basic">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5>Calendar</h5>
                                </div>
                                <div class="col-lg-6">
                                    <input type="hidden">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id='calendar'></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./fullcalendar/lib/main.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    calendar.render();
});
</script>
<?php
$title = 'Schedule';
$content = ob_get_clean();
require 'layout.php';
?>