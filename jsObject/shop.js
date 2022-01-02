class Shop {
    mess="";
    obj="";

    id;
    name;
    bin;

    enter(bin,pass)
    {

        const xhttp = new XMLHttpRequest();

        xhttp.open("POST", "https://shop.tiwy.ru/index.php?action=enter_mob", false);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.send("bin="+bin+"&password="+pass);
        this.mess = xhttp.responseText;
    }
    ini() {
        this.obj = JSON.parse(this.mess);
        this.id=this.obj.id;
        this.name=this.obj.name;
        this.bin=this.obj.bin;

    }




}