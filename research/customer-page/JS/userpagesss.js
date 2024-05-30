const products = [
    {
        id: 1,
        img: "images/tshirt.jpg",
        title: "T-shirt",
        url: "products.php?catalog_id=1"
    },
    {
        id: 2,
        img: "images/mugs.jpg",
        title: "Mugs",
        url: "products.php?catalog_id2=2"
    },
    {
        id: 3,
        img: "images/keyholder.jpg",
        title: "Keyholder",
        url: "products.php?catalog_id3=3"
    },
    {
        id: 4,
        img: "images/totebag.jpg",
        title: "Totebag",
        url: "products.php?catalog_id4=5"
    },
    {
        id: 5,
        img: "images/coinpurse.jpg",
        title: "Coinpurse",
        url: "products.php?catalog_id5=5"
    },
    {
        id: 6,
        img: "images/decalsticker.jpg",
        title: "Decal Sticker",
        url: "products.php?catalog_id6=6"
    },
    {
        id: 7,
        img: "images/tumbler.jpg",
        title: "Tumbler",
        url: "products.php?catalog_id7=7"
    },
    {
        id: 8,
        img: "images/fridgemagnet.jpg",
        title: "Fridge Magnet",
        url: "products.php?catalog_id8=8"
    }
];


let search = document.getElementsByClassName('search')[0];
let searching = document.getElementById('searching');

window.addEventListener('load', () =>{
    products.forEach(element => {
        const {img, title, url} = element;

        let card = document.createElement('a');
        card.href = url;
        card.innerHTML = ` <img src="${img}" alt="">
                    <div class="contents">
                    <h4>${title}</h4>
                    </div>`;

        search.appendChild(card);
    });
});

searching.addEventListener('keyup', () =>{
    let filter = searching.value.toUpperCase();
    let a = search.getElementsByTagName('a');

    for (let i = 0; i < a.length; i++) {
        let b = a[i].getElementsByClassName('contents')[0];
        let c = b.getElementsByTagName('h4')[0];

        let textValue = c.textContent || c.innerText;

        if(textValue.toUpperCase().indexOf(filter) > -1){
            a[i].style.display = '';
            search.style.visibility = 'visible';
            search.style.opacity = '1';

        }else{
            a[i].style.display = 'none';
        }
        if(searching.value == 0){
            search.style.visibility = 'hidden';
            search.style.opacity = '0';

            
        }
    }
});

let tshirt = document.getElementById('t-shirt');
let mugs = document.getElementById('mugs');
let keyholder = document.getElementById('keyholder');
let totebag = document.getElementById('totebag');

let itemOne = document.getElementById('itemOne');
let itemTwo = document.getElementById('itemTwo');
let itemThree = document.getElementById('itemThree');
let itemFour = document.getElementById('itemFour');

tshirt.addEventListener("click", () => {
    itemOne.style.top = '0';
});
mugs.addEventListener("click", () => {
    itemTwo.style.top = '0';
});
keyholder.addEventListener("click", () => {
    itemThree.style.top = '0';
});
totebag.addEventListener("click", () => {
    itemFour.style.top = '0';
});

let exitOne = document.getElementById('exitOne');
let exitTwo = document.getElementById('exitTwo');
let exitThree = document.getElementById('exitThree');
let exitFour = document.getElementById('exitFour');

exitOne.addEventListener("click", () => {
    itemOne.style.top = '-100%';
});

exitTwo.addEventListener("click", () => {
    itemTwo.style.top = '-100%';
});

exitThree.addEventListener("click", () => {
    itemThree.style.top = '-100%';
});

exitFour.addEventListener("click", () => {
    itemFour.style.top = '-100%';
});