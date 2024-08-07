$(document).ready(function() {
    $('#timepicker1, #timepicker2, #timepicker3').each(function() {
        var $this = $(this);
        var timepickerInput = $this.find('input');

        $this.timepicker({
            showMeridian: false,
            minuteStep: 1,
            secondStep: 1,
            showSeconds: true,
            defaultTime: 'current',
            icons: {
                up: 'ti ti-chevron-up',
                down: 'ti ti-chevron-down'
            }
        }).on('changeTime.timepicker', function(e) {
            timepickerInput.val(e.time.value);
        });
    });
});