class Notification{
    success(){
        new Noty({
            type:'success',
            layout:'topRight',
            text:'Successfully Inserted',
            timeout:3600,
        }).show();
    }

    update(){
        new Noty({
            type:'success',
            layout:'topRight',
            text:'Successfully Updated',
            timeout:3600,
        }).show();
    }

    alert(){
        new Noty({
            type:'alert',
            layout:'topRight',
            text:'are you sure ?',
            timeout:3600,
        }).show();
    }
    error(){
        new Noty({
            type:'error',
            layout:'topRight',
            text:'Successfully Inserted',
            timeout:3600,
        }).show();
    }

    info(){
        new Noty({
            type:'info',
            layout:'topRight',
            text:'Successfully Inserted',
            timeout:3600,
        }).show();
    }

    warning(){
        new Noty({
            type:'warning',
            layout:'topRight',
            text:'Successfully Inserted',
            timeout:3600,
        }).show();
    }

    image_validation(){
        new Noty({
            type:'error',
            layout:'topRight',
            text:'Uploaded image Should be less then 2MB',
            timeout:3600,
        }).show();
    }

    cart(){
        new Noty({
            type:'success',
            layout:'topRight',
            text:'Product Added to Cart',
            timeout:3600,
        }).show();
    }

    remove(){
        new Noty({
            type:'success',
            layout:'topRight',
            text:'Product Removed from the Cart',
            timeout:3600,
        }).show();
    }

    stock(){
        new Noty({
            type:'error',
            layout:'topRight',
            text:'Product Not Available at Stock',
            timeout:3600,
        }).show();
    }



}
export default Notification = new Notification()
