let numberOrder ='';
let controls = document.querySelectorAll('.sect-option');
let tabs = document.querySelectorAll('.tab-item');
let orderContainer = document.getElementById('order');
let modalHead = document.querySelector('.window > h4');
let itemContainer=document.querySelector('.item-container');
getOrder();
for (let i=0;i<controls.length;i++){
    controls[i].addEventListener('click',()=>{
        selectTab(controls[i].dataset.tab);
    });
}
selectTab('0');
function selectTab(parametr){
    for (let i=0;i<tabs.length;i++){
        if (tabs[i].dataset.tab!=parametr){
            tabs[i].classList.add('hide');
        }
        else tabs[i].classList.remove('hide');
    }
}


let modalWindow=document.querySelector('.modal');
let sost =false;

async function modal(id){
    sost=!sost;
    if (sost) {
        modalWindow.classList.remove('hide');
        modalHead.innerHTML=id;
        itemContainer.innerHTML='';
        let form = new FormData();
        form.append('name_order',id);
        await fetch('./../function/gerOrderInnerList.php',{method:'POST',body:form}).then(res=>res.json()).then(
            (data)=>{
                console.log(data);
                for (let i =0;i<data.length;i++){
                    itemContainer.innerHTML+='<div class="tab-basket-item"><div class="logo-item"><img src="'+data[i].item_photo+'" alt=""><div class="name-item"><h4>'+data[i].item_name+'</h4><span>'+data[i].category_name+'</span></div></div><div class="count"><button class="btn-black">'+data[i].price_item+'руб.</button><span id="count">'+data[i].order_item_count+'</span></div></div>';
                }
            }
        )  
    }
    else {modalWindow.classList.add('hide');}
}
getBasket();
let dataContainer =[];
async function getBasket(){
    await  fetch('./../function/getBasket.php').then(res=>res.json())
        .then((data)=> {
            console.log(data);
            dataContainer = data;
            checkCount();
            checkTotalPrice();
            let cont = document.querySelector('#cont');
            for (let i=0;i<data.length;i++){
                cont.innerHTML+='<div class="tab-basket-item"><div class="logo-item"><img src="'+data[i].photo_item+'" alt=""<div class="name-item"><div><h4>'+data[i].name_item+'</h4><span>'+data[i].category_item+'</span></div></div><span>Всего: '+data[i].count_total_item+'</span><div class="count"><button class="btn-black">'+data[i].price_item+'руб.</button><button class="btn-black" onclick="addItem(1,'+data[i].id_item+','+i+')">+</button><span id="count'+data[i].id_item+'">'+data[i].count_item+'</span><button onclick="addItem(-1,'+data[i].id_item+','+i+')" class="btn-red">-</button><button class="btn-red" onclick="deleteItem('+i+','+data[i].id_item+')">Удалить</button></div></div>';
            }
        });
        // checkCount();
}
async function addItem(n,id,index){


    if (dataContainer[index].count_total_item>=Number(dataContainer[index].count_item)+Number(n) && Number(dataContainer[index].count_item)+Number(n)>=1){
        dataContainer[index].count_item=Number(dataContainer[index].count_item)+Number(n);
    } 
    let countSpan = document.getElementById('count'+id);
    countSpan.innerHTML=dataContainer[index].count_item;
    checkTotalPrice();
    let formAdd = new FormData();
    formAdd.append('id_item',id);
    formAdd.append('count_item',dataContainer[index].count_item);
    await fetch('./../function/editBasket.php',{ method: 'POST', body: formAdd }).then(res=>res.json()).then(
        (data)=>{
            console.log(data);
        }
    )
    

}

function checkCount(){
    console.log(dataContainer.length);
    if (dataContainer.length==0){
        cont.innerHTML = '<div class="tab-basket-item"><h2 style="margin:auto">Корзина пуста</h2></div>'
    }
}
function deleteItem(index,id){
    let formDelete = new FormData();
    formDelete.append('id_item',id);
    formDelete.append('count_item',0);
    fetch('./../function/editBasket.php',{method:'POST',body:formDelete}).then(res=>res.json()).then(
        (data)=>{
            console.log(data);
        }
    )
    cont.innerHTML='<div class="tab-basket-item"><span>Итого: <span id="total">50руб.</span></span><button class="btn-black" onclick="pushOrder();getBasket();selectTab('+0+')">Оформить</button></div>';
dataContainer.splice(index,1);
console.log(index);
for (let i=0;i<dataContainer.length;i++){
    cont.innerHTML+='<div class="tab-basket-item"><div class="logo-item"><img src="'+dataContainer[i].photo_item+'" alt=""<div class="name-item"><div><h4>'+dataContainer[i].name_item+'</h4><span>'+dataContainer[i].category_item+'</span></div></div><span>Всего: '+dataContainer[i].count_total_item+'</span><div class="count"><button class="btn-black">'+dataContainer[i].price_item+'руб.</button><button class="btn-black" onclick="addItem(1,'+dataContainer[i].id_item+','+i+')">+</button><span id="count'+dataContainer[i].id_item+'">'+dataContainer[i].count_item+'</span><button onclick="addItem(-1,'+dataContainer[i].id_item+','+i+')" class="btn-red">-</button><button class="btn-red" onclick="deleteItem('+i+','+dataContainer[i].id_item+')">Удалить</button></div></div>';
}
checkCount();
checkTotalPrice();
}
function checkTotalPrice(){
    let totalPrice = 0;
    for (let i =0;i<dataContainer.length;i++){
        totalPrice += dataContainer[i].count_item*dataContainer[i].price_item;
    }
    console.log(totalPrice);
    if (document.getElementById('total')) document.getElementById('total').innerHTML = totalPrice+'руб.';
}
async function pushOrder(){
    await getOrderNumber();
    let form = new FormData();
    form.append('number',numberOrder);
    await fetch('./../function/pushOrder.php',{body:form,method:'POST'}).then(res=>res.json()).then(data=>{
        console.log(data+" <> "+numberOrder);
    })
    await getBasket();
    await getOrder();
}
async function getOrderNumber(){
    
    await fetch('./../function/pushOrderName.php').then(res=>res.json()).then(
        data=>{
            numberOrder=data;
            console.log(data+" <><><><><><><><><><><><>"+numberOrder);
        }
        )
    
    
}

async function getOrder(){
    orderContainer.innerHTML='';
    await fetch('./../function/getOrder.php').then(res=>res.json()).then(data=>{
        console.log(data);
        if (data.length==0){
            orderContainer.innerHTML = '<h2 style="text-align: center">Заказов нет</h2>'
        }
        else{
            for (let i =0;i<data.length;i++){
                if (data[i].status_name=='Новый')
                orderContainer.innerHTML+=
                '<div class="tab-item-card">'+
                '<div><h4>Номер заказа</h4></div><div><h4>Дата заказа</h4></div><div><h4>Статус заказа</h4></div>'+
                '<div><button class="btn-red" onclick="deleteOrder('+data[i].name_order+');">Удалить</button></div>'+
                // else orderContainer.innerHTML+='<div class="empty"></div>';
                '<div>  #'+data[i].name_order+'</div><div>'+data[i].date+'</div><div>'+data[i].status_name+'</div><button class="btn-black hover" onclick="modal('+data[i].name_order+')">Подробнее</button>'+
                '</div>';
                else
                orderContainer.innerHTML+=
                '<div class="tab-item-card">'+
                '<div><h4>Номер заказа</h4></div><div><h4>Дата заказа</h4></div><div><h4>Статус заказа</h4></div>'+
                '<div class="empty"></div>'+
                '<div>  #'+data[i].name_order+'</div><div>'+data[i].date+'</div><div>'+data[i].status_name+'</div><button class="btn-black" onclick="modal('+data[i].name_order+')">Подробнее</button>'+
                '</div>';
            }
        }
    });
}
async function deleteOrder(id){
    let form = new FormData();
    form.append('name_order',id);
    await fetch('./../function/deleteOrder.php',{body:form,method:'POST'}).then(res=>res.json()).then(
        data=>{
            console.log(data);
        }
    );
    await getOrder();
}



