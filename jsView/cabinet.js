class Cabinet {

    constructor () {
        let shop = JSON.parse(localStorage.getItem("data"));

        let p = document.getElementsByTagName("p");
        p[0].innerHTML=shop.name;
        p[1].innerHTML=shop.bin;
    }

    clickMenu() {
        let li = document.getElementsByTagName("li");

        li[0].onclick=this.addProductForm;
        li[1].onclick=this.listProduct;
        li[2].onclick=this.listDeal;

    }
    addProductForm() {
        let p = document.getElementsByTagName("p");
        let context="";

        context+="<input name='name' type='text' placeholder='Наименование'><br>";
        context+="<input name='price1' type='text' placeholder='Цена1'><br>";
        context+="<input name='price2' placeholder='Цена2'><br>";
        context+="<input name='code' type='code' placeholder='Код'><br>";
        context+="<input name='file' type='file' >";
        context+="<button id='add'>Добавить</button>";


        p[2].innerHTML=context;

        let button = document.getElementById("add");
        button.onclick = Cabinet.addProduct;



    }
    static addProduct()
    {
        let name = document.getElementsByName("name")[0].value;
        let code = document.getElementsByName("code")[0].value;
        let price1 = document.getElementsByName("price1")[0].value;
        let price2 = document.getElementsByName("price2")[0].value;
        let file = document.getElementsByName("file")[0].files[0];
        Product.add(name,code,price1,price2,file);
        alert(Product.message);

    }
    listProduct() {
        let p = document.getElementsByTagName("p");
        let context="";
        context+="<table border='1px'>";
        context+="<tr><th></th><th>Номер</th><th>Наименование</th><th>Цена закупа</th><th>Цена продаж</th></tr>";
        Product.findProduct("");
        let products = JSON.parse(Product.products);
        for(let i=0;i<products.length;i++)
            context+="<tr onclick=\"Cabinet.goProduct('"+products[i].name+"')\"><td><img width=\"50px\" src=\"https://shop.tiwy.ru/"+products[i].img+"\"></td>" +
                "<td>"+i+"</td><td>"+products[i].name+"</td>" +
                "<td>"+products[i].price1+"</td>" +
                "<td>"+products[i].price2+"</td></tr>";
        context+="</table>";
        p[2].innerHTML=context;
    }

    static goProduct(arg)
    {
        alert(arg);
    }
    listDeal()
    {
        let p = document.getElementsByTagName("p");
        let context="";
        context+="<tr><th></th><th>Дата</th><th>Тип</th><th>Сумма</th></tr>";
        context+="<table border='1px'>";
        Deal.find();
        let deals=JSON.parse(Deal.message);
        for (let i=0;i<deals.length;i++)
            context+="<tr><th></th><th>"+deals[i].date+"</th><th>"+deals[i].type+"</th><th>"+deals[i].sum+"</th></tr>";
        context+="</table>";
        p[2].innerHTML=context;
    }





}