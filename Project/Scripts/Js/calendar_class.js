
    function init_calendar(redraw_function,time_interval) {
        var last_day_input= $('#last_day');
        var cur_date=new Date();
        /*var min_date=new Date(cur_date);
        min_date.setFullYear(min_date.getFullYear()-100);
        var max_date=new Date(cur_date);
        last_day_input.val(DateInterval.date_to_string(cur_date));
        last_day_input.attr('min',DateInterval.date_to_string(min_date));
        last_day_input.attr('max',DateInterval.date_to_string(max_date));*/
        $('#interval_label').text(time_interval.interval_to_string());



        $('#calendar_button').bind('click',function () {
            $('#calendar_modal').css('display','block');
        });
        set_calendar_card_buttons_handlers(time_interval);
        /*var calendar_card_close1=document.getElementById('calendar_card_close1');
        calendar_card_close1.addEventListener('click',calendar_card_close_handler);
        calendar_card_close1.addEventListener('click',redraw_function);*/
        $('#calendar_card_close1').bind('click',function () {
            calendar_card_close_handler(redraw_function,time_interval);
        });
        $('#calendar_card_close2').bind('click',function () {
            calendar_card_close_handler(redraw_function,time_interval);});
    }
    function set_calendar_card_buttons_handlers(timeinterval) {
        $('#all_time').bind('click',function () {
            time_interval.set_all_time(new Date());
        });
        $('#month').bind('click',function () {
            var input=$('#last_day').val();
            if(input!=''){
                var last_day=new Date(input);
                time_interval.set_month(last_day);}
        });
        $('#week').bind('click',function () {
            var input=$('#last_day').val();
            if(input!=''){
            var last_day=new Date(input);
            time_interval.set_week(last_day);}
        });
        $('#day').bind('click',function () {
            var input=$('#last_day').val();
            if(input!=''){
                var last_day=new Date(input);
                time_interval.set_one_day(last_day);}
        });
    /*document.getElementById('all_time').onclick=function () {
        time_interval.set_all_time();
        $('#interval_label').text(time_interval.interval_to_string());
    };
    document.getElementById('month').onclick=function () {
        time_interval.set_month();
        $('#interval_label').text(time_interval.interval_to_string());
    };
    document.getElementById('week').onclick=function () {
        time_interval.set_week();
        $('#interval_label').text(time_interval.interval_to_string());
    };
    document.getElementById('day').onclick=function () {
        time_interval.set_one_day();
        $('#interval_label').text(time_interval.interval_to_string());
    };*/
}
    function calendar_card_close_handler(redraw_function,time_interval) {
        document.getElementById('calendar_modal').style.display='none';
        $('#interval_label').text(time_interval.interval_to_string());
        redraw_function();
    //получить все категории и отрисовать все катгории заново
    }
