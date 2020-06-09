function menu_bar_events_handler(){
    $("#logout_form").submit(function(event) {
        event.preventDefault();
        localStorage.removeItem('token');
        document.location='http://smartexpenses';
    });
}