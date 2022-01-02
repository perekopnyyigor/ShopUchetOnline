class Deal {
    static message;

    static find()
    {
        let shop = JSON.parse(localStorage.getItem("data"));

        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "https://shop.tiwy.ru/index.php?action=find_deal", false);
        let formData = new FormData();
        formData.append("shop_id", shop.id);
        xhttp.send(formData);
        Deal.message = xhttp.responseText;


    }
}