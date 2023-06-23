let buttons = document.querySelectorAll('.option_container button');
let tabs = document.querySelectorAll('.tab-item');
let cat = document.getElementById('cat');
let view =false;
let orderContainer =document.querySelector('#order_container');

let id_category='';
let id_item='';
let id_data_container='';

getCategory();
function getId(id){
id_category=id;
}//setId
function setIdItem(id){
    id_item=id;
}
function setIdDataContainer(id){
    id_data_container=id;
}

async function getCategory(){
    let x = document.getElementById('add_category');
    x.innerHTML='';
    let x1 = document.getElementById('edit_category');
    x1.innerHTML='';

    cat.innerHTML="<button class=\"btn-black\" onclick=\"editView('add')\" style=\"width: 100%;\" >Добавить категорию</button>";
    await fetch('./../function/getCategory.php').then(res=>res.json()).then(
        data=>{
            for (let i=0;i<data.length;i++){
                cat.innerHTML+=' <div class="tab-basket-item"><input id="'+data[i].id_category+'_cat" oninput="editValue(\''+data[i].id_category+'_cat\');" type="text" value="'+data[i].category_name+'" placeholder="Имя категории"><div class="count"><button class="btn-black" onclick="finalValue(\''+data[i].id_category+'_cat\');getId(\''+data[i].id_category+'\'); editCategory(\''+data[i].id_category+'_cat\'); getItems();">Сохранить</button><button class="btn-red" onclick="editView(\'delete\'); getId(\''+data[i].id_category+'\');">Удалить</button></div></div>';
                x.innerHTML+='<option value="'+data[i].id_category+'">'+data[i].category_name+'</option>'
                x1.innerHTML+='<option value="'+data[i].id_category+'">'+data[i].category_name+'</option>'
            }
            console.log(data);
        }
    )
    getItems();
}
selectTab('0');
for (let i=0;i<buttons.length;i++){
    buttons[i].addEventListener('click', ()=>{
        selectTab(buttons[i].dataset.option);
    })
}
function selectTab(index){
    for (let i=0;i<tabs.length;i++){
        if (tabs[i].dataset.option!=index) tabs[i].classList.add('hide');
        else tabs[i].classList.remove('hide');
    }
}
function editValue(id){
document.getElementById(id).classList.add('edit');
}
function finalValue(id){
    document.getElementById(id).classList.remove('edit');
} 
function editView(id){
    view=!view;
    if (view) document.getElementById(id).classList.remove('hide');
    else document.getElementById(id).classList.add('hide');
}
async function pushCategory(){
    let form = new FormData();
    form.append('category',document.getElementById('new-cat').value);
    await fetch('./../function/pushCategory.php',{body:form,method:'POST'}).then(res=>res.json()).then(
        data=>{
            console.log(data);
        }
    )
    getCategory();
}
async function deleteCategory(){
    let form = new FormData();
    form.append('id_category',id_category);
    await fetch('./../function/deleteCategory.php',{body:form,method:'POST'}).then(res=>res.json()).then(
        data=>{
            console.log(data);
        }
    )
    getCategory();
}
getItems();
let dataContainer =[];
async function getItems(){
    await fetch('./../function/getItems1.php').then(res=>res.json())
        .then((data)=>{
            console.log(data);
            dataContainer=data;
            console.log(12);
            let container =document.querySelector('.card_container');
            container.innerHTML='';
            for (let i=0;i<data.length;i++){
                container.innerHTML+='<div id="'+data[i].id_item+'" data-type="'+data[i].id_category+'" class="card"><h4>'+data[i].item_name+'</h4><img id="photo" src="'+data[i].item_photo+'" alt="Товар"><p class="price">'+data[i].price+'руб.</p><div class="under-modal"><button class="btn-black" onclick="setIdItem('+data[i].id_item+');getItemInnerCard('+i+');editView(\'editItem\');">Изменить</button><button class="btn-red" onclick="editView(\'deleteItem\');setIdItem('+data[i].id_item+');">удалить</button></div></div>';
            }
            // card = document.querySelectorAll('.card');
            // for (let i=0;i<card.length;i++){
            //     card[i].addEventListener('click', ()=>{modalView(card[i].id)});
            // }
        })
}
async function editCategory(id_input){

    let form = new FormData();
    form.append('id_category',id_category);
    form.append('category',document.getElementById(id_input).value);
    await fetch('./../function/editCategory.php',{body:form,method:'POST'}).then(res=>res.json()).then(
        data=>{
            console.log(data);
        }
    )
    getCategory();

}



async function pushItem(){
    let add_name=document.getElementById('add_name').value;
    let add_file=document.getElementById('add_file').files[0];
    let add_category=document.getElementById('add_category').value;
    let add_year=document.getElementById('add_year').value;
    let add_country=document.getElementById('add_country').value;
    let add_count=document.getElementById('add_count').value;
    let add_price=document.getElementById('add_price').value;
    
    let form = new FormData();

    form.append('item_name',add_name);
    form.append('photo',add_file);
    form.append('id_category',add_category);
    form.append('year',add_year);
    form.append('country',add_country);
    form.append('price',add_price);
    form.append('count',add_count);
    await fetch('./../function/pushItem.php',{body:form ,method:'POST'}).then(res=>res.json()).then(
        data=>{
            console.log(data);
        }
        
    )
    getItems();
    
}
let edit_photo = document.getElementById('edit_photo');
let edit_name = document.getElementById('edit_name');
let edit_file = document.getElementById('edit_file').files[0];
let edit_category = document.getElementById('edit_category');
let edit_year = document.getElementById('edit_year');
let edit_country = document.getElementById('edit_country');
let edit_number = document.getElementById('edit_number');
let edit_price = document.getElementById('edit_price');

function getItemInnerCard(i){
    edit_photo.src=dataContainer[i].item_photo;
    edit_name.value = dataContainer[i].item_name;
    edit_category.value = dataContainer[i].id_category;
    edit_year.value =dataContainer[i].year;
    edit_country.value=dataContainer[i].country;
    edit_number.value = dataContainer[i].count;
    edit_price.value=dataContainer[i].price;
}
async function editItem(){
    let form = new FormData();

    form.append('id_item',id_item);
    form.append('item_name',edit_name.value);
    form.append('photo',edit_file);
    form.append('id_category',edit_category.value);
    form.append('year',edit_year.value);
    form.append('country',edit_country.value);
    form.append('price',edit_price.value);
    form.append('count',edit_number.value);
    await fetch('./../function/editItem.php',{body:form ,method:'POST'}).then(res=>res.json()).then(
        data=>{
            console.log(data);
        }
    )
}
async function deleteItem(){
    let form = new FormData();

    form.append('id_item',id_item);

    await fetch('./../function/deleteItem.php',{body:form ,method:'POST'}).then(res=>res.json()).then(
        data=>{
            console.log(data);
        }
    )
    getItems();
}
getOrder()
async function getOrder(){
    orderContainer.innerHTML='';
    await fetch('./../function/getOrder1.php').then(res=>res.json()).then(data=>{
        console.log(data);
        if (data.length==0){
            orderContainer.innerHTML = '<h2 style="text-align: center">Заказов нет</h2>'
        }
        else{
            for (let i =0;i<data.length;i++){
                orderContainer.innerHTML+=
                '<div class="tab-item-card">'+
                '<div><h4>Номер заказа</h4></div><div><h4>Дата заказа</h4></div><div><h4>Статус заказа</h4></div><div class="empty"></div>'+
                '<div>  #'+data[i].name_order+'</div><div>'+data[i].date+'</div><select id="select'+data[i].name_order+'" onchange="editStatus('+data[i].name_order+')"><option value="1">Новый</option><option value="2">Обработка данных</option><option value="3">Завершен</option></select><button class="btn-black" onclick="editView(\'moreItem\');getOrderInnerList('+data[i].name_order+')">Подробнее</button>'+
                '</div>'
                document.getElementById('select'+data[i].name_order).value=data[i].id_status;
            }
        }
    })
}
async function getOrderInnerList(id){
        let modalHead= document.getElementById('modalHead');
        modalHead.innerHTML=id;
        let itemContainer = document.getElementById('itemContainer');
        itemContainer.innerHTML='';
        let form = new FormData();
        form.append('name_order',id);
        await fetch('./../function/gerOrderInnerList1.php',{method:'POST',body:form}).then(res=>res.json()).then(
            (data)=>{
                console.log(data);
                for (let i =0;i<data.length;i++){
                    itemContainer.innerHTML+='<div class="tab-basket-item"><div class="logo-item"><img src="'+data[i].item_photo+'" alt=""><div class="name-item"><h4>'+data[i].item_name+'</h4><span>'+data[i].category_name+'</span></div></div><div class="count"><button class="btn-black">'+data[i].price_item+'руб.</button><span id="count">'+data[i].order_item_count+'</span></div></div>';
                }
            }
        )
}
async function editStatus(id){
    let form = new FormData();
    form.append('name_order',id);
    form.append('id_status',document.getElementById('select'+id).value);
    fetch('./../function/editStatus.php',{body:form,method:'POST'}).then(res=>res.json()).then(
        data=>{
            console.log(data);
        }
        )
}