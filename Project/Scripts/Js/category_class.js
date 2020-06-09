class Category {
    constructor(id,name,sum) {
        this.id = id;
        this.name = name;
        this.sum=parseInt(sum);
    }
    /*_get_sum(){
        this._sum=0;
        for(var val of this.operations) {
            this.sum += val.value;
        }
    }*/
    /*add_operations_by_interval(operations){
        if(operations!=null){
            this.operations=operations;
            _get_sum();
        }
        else
            this.sum=0;

    }*/
}