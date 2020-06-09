class DateInterval{
    startDateTime;
    endDateTime;
    isAllTime;
    constructor(endDateTime) {
        this.set_all_time(endDateTime);
    }
    set_month(endDateTime){
        this.endDateTime=new Date(endDateTime);
        this.startDateTime=new Date(endDateTime);
        this.startDateTime.setMonth(this.startDateTime.getMonth()-1);
        this.isAllTime=false;
    }
    set_week(endDateTime){
        this.endDateTime=new Date(endDateTime);
        this.startDateTime=new Date(endDateTime);
        this.startDateTime.setDate(this.startDateTime.getDate()-7);
        this.isAllTime=false;
    }

    set_one_day(endDateTime){
        this.endDateTime=new Date(endDateTime);
        this.startDateTime=new Date(endDateTime);
        this.startDateTime.setDate(this.startDateTime.getDate()-1);
        this.isAllTime=false;
    }
    set_all_time(endDateTime){
        this.endDateTime=new Date(endDateTime);
        this.startDateTime=new Date(endDateTime);
        this.isAllTime=true;

    }
    interval_to_string(){
        if(this.isAllTime)
            return "Все время";
        else
            return DateInterval.date_to_string(this.startDateTime)+' - '+DateInterval.date_to_string(this.endDateTime);
    }
    static date_to_string(date){
        return date.getDate()+'.'+(date.getMonth()+1)+'.'+date.getFullYear();
    }
    /*static date_to_required_format(date){
        var res_date=date.getFullYear()+'-';
        var month=date.getMonth()+1;
        if(month<10)
            month='0'+month;
        res_date+=month+'-';
        var dateD=date.getDate();
    }*/
}