const products = [
    {
        id: 1,
        img: "images/tshirt.jpg",
        title: "T-shirt",
        url: "../login.php"
    },
    {
        id: 2,
        img: "images/mugs.jpg",
        title: "Mugs",
        url: "../login.php"
    },
    {
        id: 3,
        img: "images/keyholder.jpg",
        title: "Keyholder",
        url: "../login.php"
    },
    {
        id: 4,
        img: "images/totebag.jpg",
        title: "Totebag",
        url: "../login.php"
    },
    {
        id: 5,
        img: "images/coinpurse.jpg",
        title: "Coinpurse",
        url: "../login.php"
    },
    {
        id: 6,
        img: "images/decalsticker.jpg",
        title: "Decal Sticker",
        url: "../login.php"
    },
    {
        id: 7,
        img: "images/tumbler.jpg",
        title: "Tumbler",
        url: "../login.php"
    },
    {
        id: 8,
        img: "images/fridgemagnet.jpg",
        title: "Alcohol bottle",
        url: "../login.php"
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

