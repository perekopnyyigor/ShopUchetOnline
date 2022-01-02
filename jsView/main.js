class Main {
    text="ok";
    constructor() {

        this.text="ok1";
        this.body=document.getElementsByTagName("body");
        this.buttons=document.getElementsByTagName("button");

        this.buttons[1].onclick=this.onReg;
        this.buttons[0].onclick=this.enter;

    }
    //переход на форму регистрации
    onReg( )
    {
        document.location.href="../html/reg.html";
    }
    //вход
    enter()
    {
        let inputs = document.getElementsByTagName("input");

        let bin = inputs[0].value;
        let pass = inputs[1].value;

        let shop = new Shop();
        shop.enter(bin, pass);
        shop.ini();

        localStorage.setItem("data",shop.mess);
        document.location.href="../html/cabinet.html";


    }

}