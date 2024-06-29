function locomotive(){
    gsap.registerPlugin(ScrollTrigger);

    const locoScroll = new LocomotiveScroll({
    el: document.querySelector(".main"),
    smooth: true
    });
    locoScroll.on("scroll", ScrollTrigger.update);

    ScrollTrigger.scrollerProxy(".main", {
    scrollTop(value) {
        return arguments.length ? locoScroll.scrollTo(value, 0, 0) : locoScroll.scroll.instance.scroll.y;
    }, 
    getBoundingClientRect() {
        return {top: 0, left: 0, width: window.innerWidth, height: window.innerHeight};
    },
    
    pinType: document.querySelector(".main").style.transform ? "transform" : "fixed"
    });

    ScrollTrigger.addEventListener("refresh", () => locoScroll.update());

    ScrollTrigger.refresh();

}

locomotive()



var cards = [
    {name: "Gota-Ahmedabad", dataName: "Ahmedabad", details: "3 Bedrooms + 1 Hall + 1 Kitchen", price: "7,999", image: "1.png"},
    {name: "Jakkur-Banglore", dataName: "Banglore", details: "3 Bedrooms + 1 Hall + 1 Kitchen", price: "11,999", image: "12.png"},
    {name: "Thaltej-Ahmedabad", dataName: "Ahmedabad", details: "2 Bedrooms + 1 Hall + 1 Kitchen", price: "6,999", image: "4.png"},
    {name: "Kirti Nagar, New Delhi", dataName: "New Delhi", details: "2 Bedrooms + 1 Hall + 1 Kitchen", price: "5,499", image: "10.png"},
    {name: "Vesu-Surat", dataName: "Surat", details: "3 Bedrooms + 1 Hall + 1 Kitchen", price: "7,999", image: "5.png"},
    {name: "Adalaj-Gandhinagar", dataName: "Gandhinagar", details: "2 Bedrooms + 1 Hall + 1 Kitchen", price: "8,499", image: "7.png"},
    {name: "Vesu-Surat", dataName: "Surat", details: "3 Bedrooms + 1 Hall + 1 Kitchen", price: "6,999", image: "6.png"},
    {name: "Thaltej-Ahmedabad", dataName: "Ahmedabad", details: "2 Bedrooms + 1 Hall + 1 Kitchen", price: "5,999", image: "3.png"},
    {name: "Nirman Nagar, Jaipur", dataName: "Jaipur", details: "3 Bedrooms + 1 Hall + 1 Kitchen", price: "7,999", image: "8.png"},
    {name: "Vasant Vihar, New Delhi", dataName: "New Delhi", details: "3 Bedrooms + 1 Hall + 1 Kitchen", price: "6,499", image: "9.png"},
    {name: "Gota-Ahmedabad", dataName: "Ahmedabad", details: "2 Bedrooms + 1 Hall + 1 Kitchen", price: "7,499", image: "2.png"},
    {name: "Jakkur, Banglore", dataName: "Banglore", details: "2 Bedrooms + 1 Hall + 1 Kitchen", price: "7,999", image: "11.png"}
]


function addProduct(){
    var clutter = "";

    cards.forEach(function(card){
        clutter += `<div class="box" data-name="${card.dataName}">
        <div class="card">
            <div class="card-img">
                <img src="imgs/${card.image}" alt="">
            </div>
            <div class="card-info">
                <h6 class="text-title"> ${card.name} </h6>
                <p class="text-body">3 Bedrooms + 1 Hall + 1 Kitchen</p>
            </div>
            <div class="card-footer">
                <span class="text-title">Rs.${card.price}/month</span>
                <div class="card-button">
                    <i class="ri-add-line"></i>
                </div>
            </div>
        </div>
    </div>`
    });
}

addProduct();



var scrollCards = [
    {name: "Slim Chair", dataName: "Chair", details: "Slim Comfortable Chair", price: "799", image: "slim chair.png"},
    {name: "Sofa", dataName: "Velvet Sofa", details: "Velvet Sofa", price: "1999", image: "sofa1.png"},
    {name: "Pendant Lamp", dataName: "Lamp", details: "Pendant Siling Lamp", price: "1999", image: "pendant lamp.png"},
    {name: "Arm Chair", dataName: "Chair", details: "Arm Comfortable Chair", price: "799", image: "Arm Chair.png"},
    {name: "Sofa", dataName: "Velvet Sofa", details: "Velvet Sofa", price: "1999", image: "sofa2.png"},
    {name: "Coffee Chair", dataName: "Chair", details: "Coffee Comfortable Chair", price: "799", image: "coffee chair.png"},
    {name: "Sofa Chair", dataName: "Velvet Sofa", details: "Comfortable Sofa Chair", price: "1999", image: "sofachair1.png"},
    {name: "Modern Chair", dataName: "Chair", details: "Modern Comfortable Chair", price: "799", image: "chair2.png"},
    {name: "Stone Lamp", dataName: "Lamp", details: "Stone Shape Lamp", price: "1999", image: "stone lamp.png"},
    
    
]


function addScrollCards(){
    var clutter = "";

    scrollCards.forEach(function(card){
        clutter += `<div class="swiper-slide">
        <div class="box">
            <div class="card" data-name="${card.dataName}">
                <div class="card-img">
                    <img src="imgs/${card.image}" alt="">
                </div>
                <div class="card-info">
                    <h6 class="text-title">${card.name} </h6>
                    <p class="text-body">${card.details}</p>
                </div>
                <div class="card-footer">
                    <span class="text-title">$ ${card.price}</span>
                    <div class="card-button">
                        <i class="ri-add-circle-fill"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>`
    })

    document.querySelector(".swiper-wrapper").innerHTML = clutter;

}

addScrollCards()




const filterButtons = document.querySelectorAll(".page6>.down #filter-buttons button");
const filterableCards = document.querySelectorAll(".page6>.down .box");


const filterCards = (e) => {
    document.querySelector(".page6>.down #filter-buttons .active").classList.remove("active");
    e.target.classList.add("active");

    filterableCards.forEach(card => {
        card.classList.add("hide"); 

        if(card.dataset.name === e.target.dataset.filter || e.target.dataset.filter === "all") {
            return card.classList.remove("hide");
        }
    });
}






function search() {
    let filter = document.getElementById('find').value.toUpperCase();

    let item = document.querySelectorAll('.box');

    let l = document.getElementsByTagName('h6');

    for(var i = 0;i<=l.length;i++){
        let a=item[i].getElementsByTagName('h6')[0];

        let value=a.innerHTML || a.innerText || a.textContent;

        if(value.toUpperCase().indexOf(filter) > -1) {
            item[i].style.display="";
            console.log(value.toUpperCase().indexOf(filter))
        }
        else
        {
            item[i].style.display="none";
        }
    }
}

function searchPrice() {
    let filter = document.getElementById('price').value.toUpperCase();

    let item = document.querySelectorAll('.box');

    let l = document.getElementsByTagName('span');

    for(var i = 0;i<=l.length;i++){
        let a=item[i].getElementsByTagName('span')[0];

        let value=a.innerHTML || a.innerText || a.textContent;

        if(value.toUpperCase().indexOf(filter) > -1) {
            item[i].style.display="";
        }
        else
        {
            item[i].style.display="none";
        }
    }
}

// function searchRoom() {
//     let filter = document.getElementById('room').value.toUpperCase();

//     let item = document.querySelectorAll('.box');

//     let l = document.getElementsByTagName('p');

//     for(var i = 0;i<=l.length;i++){
//         let a=item[i].getElementsByTagName('p')[0];

//         let value=a.innerHTML || a.innerText || a.textContent;

//         if(value.toUpperCase().indexOf(filter) > -1) {
//             item[i].style.display="";
//         }
//         else
//         {
//             item[i].style.display="none";
//         }
//     }
// }






filterButtons.forEach(button => button.addEventListener("click", filterCards));


const FilterButtons = document.querySelectorAll(".page6>.up #filter-buttons button");
const FilterableCards = document.querySelectorAll(".page6>.down .card");


const FilterCards = (e) => {
    document.querySelector(".page6>.up #filter-buttons .activa").classList.remove("activa");
    e.target.classList.add("activa");

    filterableCards.forEach(card => {
        card.classList.add("move"); 

        if(card.dataset.name === e.target.dataset.filter || e.target.dataset.filter === "Show all") {
            return card.classList.remove("move");
        }
    });
}

FilterButtons.forEach(button => button.addEventListener("click", FilterCards));




const cardButton = document.querySelectorAll('.card-button');

cardButton.forEach(button => button.addEventListener("click",  function() {
    if(button.classList.contains('hide')){
        return button.classList.remove("hide");
    }
    button.classList.add("hide");
}));




var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3.5,
    spaceBetween: 15,
    grab: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: true
      },
  });


var swiper = new Swiper(".MySwiper", {
    slidesPerView: 3,
    spaceBetween: 25,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
        delay: 4000,
        disableOnInteraction: true
      },
  });







tl = gsap.timeline()

tl.from("nav .logo, nav .menu, nav .right",{
    x: 100,
    opacity: 0,
    duration: 1,
    stagger: .2
},"anime")

tl.from(".hero .container h1, .hero .container p",{
    y: 100,
    opacity: 0,
    duration: 1,
    delay: -.9
},"anime")
tl.from(".hero .container",{
    scale: .7,
    opacity: 0,
    duration: 1,
    delay: -1
},"anime")


tl.from(".page2 .up h2, .page2 .up p",{
    x: 100,
    opacity: 0,
    duration: 1,
    scrollTrigger: {
        scroller: ".main",
        trigger: ".up h2",
        start: "top 80%",
        end: "bottom bottom",
        // markers: true,
        stagger: .5
    },
},"anime")

tl.from(".filter, .page2 .up #find, .page2 .up #price, .page2 .up #room",{
    x: -100,
    opacity: 0,
    duration: 1,
    scrollTrigger: {
        scroller: ".main",
        trigger: ".up h2",
        start: "top 80%",
        end: "bottom bottom",
        // markers: true,
        stagger: 1
    },
},"anime")

tl.from(".page2 .down .card",{
    y: 100,
    opacity: 0,
    duration: 1,
    scrollTrigger: {
        scroller: ".main",
        trigger: ".page2 .down .card",
        start: "top 80%",
        end: "bottom bottom",
        // markers: true,
        stagger: 5
    },
},"anime")

tl.from(".page4 .left img",{
    y: 100,
    scale: .9,
    opacity: 0,
    duration: 1,
    scrollTrigger: {
        scroller: ".main",
        trigger: ".page4 .left img",
        start: "top 75%",
        end: "bottom bottom",
        // markers: true,
        stagger: 5,
    },
},"anime")

tl.from(".page4 .right h4, .page4 .right h1, .page4 .right p, .page4 .right button",{
    y: 100,
    opacity: 0,
    duration: 1,
    scrollTrigger: {
        scroller: ".main",
        trigger: ".page4 .right h4",
        start: "top 75%",
        end: "bottom bottom",
        // markers: true,
        stagger: 1
    },
},"anime")

tl.from(".page5 .right img",{
    y: 100,
    scale: .9,
    opacity: 0,
    duration: 1,
    scrollTrigger: {
        scroller: ".main",
        trigger: ".page5 .right img",
        start: "top 75%",
        end: "bottom bottom",
        // markers: true,
        stagger: 5,
    },
},"anime")


tl.from(".page5 .left h4, .page5 .left h1, .page5 .left p, .page5 .left button",{
    y: 100,
    opacity: 0,
    duration: 1,
    scrollTrigger: {
        scroller: ".main",
        trigger: ".page5 .left h4",
        start: "top 75%",
        end: "bottom bottom",
        // markers: true,
        stagger: 1
    },
},"anime")








