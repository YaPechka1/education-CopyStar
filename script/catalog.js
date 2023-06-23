getItems();
let card;
let filter = document.querySelectorAll('.filter');

let modal = document.querySelector('.modal');
for (let i=0;i<filter.length;i++){
    filter[i].addEventListener('click',()=>{selectCard(filter[i].dataset.type)});
}
let x =false;

let id_item='';
let name_item='';
let category_item='';
let price_item='';
let count_item='';
let count_total_item='';
let photoSrc_item='';



let nameModal = document.getElementById('name');
let category = document.getElementById('category');
let photo = document.getElementById('photoModal');
let year = document.getElementById('year');
let country = document.getElementById('country');

let auth = false;
isAuth();
async function isAuth(){
    
    await fetch('./../function/isAuth.php').then(res=>res.json())
    .then((data)=>{
        console.log(data);
        if (data==true) auth=true;
    })
}
console.log(auth);

    let count_total = document.getElementById('count_total');
    let  price = document.getElementById('price');
    console.log(price);
    let  count = document.getElementById('count');



function selectCard(filterValue){
    
    console.log(12+" <> "+filterValue);
    for (let i=0;i<card.length;i++){
        if (filterValue=='all') card[i].classList.remove('hide');
        else 
        
        if (card[i].dataset.type!=filterValue) card[i].classList.add('hide');
        else card[i].classList.remove('hide');
    }
}
function addModalItem(n){
    console.log(count);
    for (let i=0;i<dataContainer.length;i++){
        if (id_item==dataContainer[i].id_item){
            let x = Number(Number(count.innerHTML)+n);
            if (x>Number(dataContainer[i].count)) x=dataContainer[i].count;
            if (x<1) x=1;
            console.log(id_item+' <> '+dataContainer[i].count+' <> '+x);
            count.innerHTML=x;
            count_item = x;
        }
    }
    
}
function modalClose(){
    x=!x;
    if (x) modal.classList.remove('hide'); else modal.classList.add('hide');
}
async function modalView(id){

    
    id_item =id;
    x=!x;
    for (let i=0;i<dataContainer.length;i++){
        if (dataContainer[i].id_item==id){
            nameModal.innerHTML=dataContainer[i].item_name;
            name_item=dataContainer[i].item_name;

            category.innerHTML=dataContainer[i].category_name;
            category_item=dataContainer[i].category_name;

            photo.src = dataContainer[i].item_photo;
            photoSrc_item = dataContainer[i].item_photo;

            price_item = dataContainer[i].price

            year.innerHTML =dataContainer[i].year;
            country.innerHTML = dataContainer[i].country;
            if (auth){
                count_total.innerHTML = dataContainer[i].count;
                count_total_item = dataContainer[i].count
                
                let formId = new FormData();
                formId.append('id_item',id_item);

                await fetch('./../function/getCountItem.php',{ method: 'POST', body: formId }).then(res=>res.json())
                .then((data)=> {
                    console.log(data);
                    count.innerHTML=data;
                });
                
                count_item = count.innerHTML;

                price.innerHTML = dataContainer[i].price+' руб.';
            }
        }
    }
    if (x) modal.classList.remove('hide'); else modal.classList.add('hide');
}
async function pushBasket(){
//http://copystar/function/basket_output.php
    // id_items.push(id_item);
    // name_items.push(nameModal.innerHTML);
    // photo_items.push(photo.src);
    // category_items.push(category.innerHTML);
    // count_items.push(count.innerHTML);
    // count_total_items.push(count_total.innerHTML);
    let form = new FormData();
    
        form.append('id_item',id_item);
        form.append('name_item',name_item);
        form.append('photo_item',photoSrc_item);
        form.append('category_item',category_item);
        form.append('count_item',count_item);
        form.append('price_item',price_item);
        form.append('count_total_item',count_total_item);


  await  fetch('./../function/pushBasket.php',{ method: 'POST', body: form }).then(res=>res.json())
        .then((data)=> {
            console.log(data);
        });
    // form.append('id_item',id_item);
    // form.append('photo_item',photoSrc_item);
    // form.append('category_item',category_item);
    // form.append('count_item',count_item);
    // form.append('count_total_item',count_total_item);
}
let dataContainer =[];
async function getItems(){
    await fetch('./../function/getItems.php').then(res=>res.json())
        .then((data)=>{
            console.log(data);
            dataContainer=data;
            let container =document.querySelector('.card_container');
            
            for (let i=0;i<data.length;i++){
                container.innerHTML+='<div id="'+data[i].id_item+'" data-type="'+data[i].id_category+'" class="card"><h4>'+data[i].item_name+'</h4><img id="photo" src="'+data[i].item_photo+'" alt="Товар"><p class="price">'+data[i].price+'руб.</p></div>';
            }
            card = document.querySelectorAll('.card');
            for (let i=0;i<card.length;i++){
                card[i].addEventListener('click', ()=>{modalView(card[i].id)});
            }
        })
}