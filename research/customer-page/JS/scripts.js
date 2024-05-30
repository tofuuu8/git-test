        let tshirt = document.getElementById('t-shirt');
        let mugs = document.getElementById('mugs');
        let keyholder = document.getElementById('keyholder');
        let totebag = document.getElementById('totebag');
        let coinpurse = document.getElementById('coinpurse');
        let decalsticker = document.getElementById('decalsticker');
        let tumbler = document.getElementById('tumbler');
        let fridgemagnet = document.getElementById('fridgemagnet');


        let itemOne = document.getElementById('itemOne');
        let itemTwo = document.getElementById('itemTwo');
        let itemThree = document.getElementById('itemThree');
        let itemFour = document.getElementById('itemFour');
        let itemFive = document.getElementById('itemFive');
        let itemSix = document.getElementById('itemSix');
        let itemSeven = document.getElementById('itemSeven');
        let itemEight = document.getElementById('itemEight');


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
        coinpurse.addEventListener("click", () => {
            itemFive.style.top = '0';
        });
        decalsticker.addEventListener("click", () => {
            itemSix.style.top = '0';
        });
        tumbler.addEventListener("click", () => {
            itemSeven.style.top = '0';
        });
        fridgemagnet.addEventListener("click", () => {
            itemEight.style.top = '0';
        });

        let exitOne = document.getElementById('exitOne');
        let exitTwo = document.getElementById('exitTwo');
        let exitThree = document.getElementById('exitThree');
        let exitFour = document.getElementById('exitFour');
        let exitFive = document.getElementById('exitFive');
        let exitSix = document.getElementById('exitSix');
        let exitSeven = document.getElementById('exitSeven');
        let exitEight = document.getElementById('exitEight');

        exitOne.addEventListener("click", () => {
            itemOne.style.top = '-150%';
        });

        exitTwo.addEventListener("click", () => {
            itemTwo.style.top = '-150%';
        });

        exitThree.addEventListener("click", () => {
            itemThree.style.top = '-150%';
        });
        
        exitFour.addEventListener("click", () => {
            itemFour.style.top = '-150%';
        });

        exitFive.addEventListener("click", () => {
            itemFive.style.top = '-150%';
        });
        
        exitSix.addEventListener("click", () => {
            itemSix.style.top = '-150%';
        });

        exitSeven.addEventListener("click", () => {
            itemSeven.style.top = '-150%';
        });
        
        exitEight.addEventListener("click", () => {
            itemEight.style.top = '-150%';
        });
