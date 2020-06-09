class Operation {
    constructor(id,value,datetime,category_name) {
        this.id = id;
        this.value = value;
        this.datetime =new Date(datetime);
        this.category_name = category_name;
    }
    static get_operations_grouped_by_date(operations){
        var opsGrouped=new Array();
        for(var i=0;operations.length>0;i++)
        {
            var elem=operations.shift();
            opsGrouped.push(new Array(elem));
            while (operations.length>0 && operations[0].datetime.getDate()==elem.datetime.getDate()){
                    opsGrouped[i].push(operations.shift());
            }
        }
        return opsGrouped;
    }

}