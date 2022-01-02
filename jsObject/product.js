class Product {
    static products;
    static message;
    static findProduct(find_product)
    {
        let shop = JSON.parse(localStorage.getItem("data"));

        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "https://shop.tiwy.ru/index.php?action=find_product", false);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.send("find_product="+find_product+"&shop_id="+shop.id);
        this.products = xhttp.responseText;
    }
    static add(name,code,price1,price2,file)
    {
        let shop = JSON.parse(localStorage.getItem("data"));
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "https://shop.tiwy.ru/index.php?action=add_product_mob", false);
        let formData = new FormData();
        formData.append("name", name);
        formData.append("file[]", file);
        formData.append("price1", price1);
        formData.append("price2", price2);
        formData.append("shop", shop.id);
        xhttp.send(formData);
        Product.message = xhttp.responseText;

    }
}