
        // Array i produktev muj mebo me php nashta
    var products = [
    { 
        name: "BMW 3 Series", 
        category: "new vehicles", 
        model: "BMW 3 series", 
        price: "$62,500", 
        kilometers: "65,000 km", 
        engineType: "disel", 
        gearbox: "Automatic", 
        image: "images/bmw cards/1-BMW-3-Series.jpg", 
        demo:"cardemo1.php",
        description: "Experience unmatched elegance and precision with the iconic BMW 3 Series, where dynamic performance meets timeless sophistication on every journey. Elevate your drive with cutting-edge technology and unrivaled comfort, defining the essence of luxury driving."
    },
    { 
        name: "BMW 5 Series", 
        category: "new vehicles", 
        model: "BMW 5 series", 
        price: "$84,500", 
        kilometers: "130,000 km", 
        engineType: "disel", 
        gearbox: "Automatic", 
        image: "images/bmw cards/bmw 5.jpg", 
        demo:"cardemo2.php",
        description: "Indulge in refined luxury and exhilarating performance with the BMW 5 Series, where every detail is crafted for a seamless fusion of power. Experience the epitome of driving pleasure, where innovation meets elegance, setting new standards in automotive excellence."
    },
    { 
        name: "BMW M3 CS", 
        category: "new vehicles", 
        model: "BMW M3 CS", 
        price: "$118,700", 
        kilometers: "45,000 km", 
        engineType: "petrol", 
        gearbox: "Manual", 
        image: "images/bmw cards/bmw m3cs.jpg", 
        demo:"cardemo3.php",
        description: "Unleash the adrenaline with the BMW M3 CS series, designed to dominate both the road and the track. Experience the ultimate driving experience, where every curve becomes a conquest and every moment an exhilarating symphony of performance and precision."
    },
    { 
        name: "BMW 7 Series", 
        category: "new vehicles", 
        model: "BMW 7 series", 
        price: "$97,000", 
        kilometers: "130,000 km", 
        engineType: "hybrid", 
        gearbox: "Automatic", 
        image: "images/bmw cards/bmw 7 hybrid.jpg", 
        demo:"cardemo4.php",
        description: "Embark on a journey of sustainable luxury with the BMW 7 Series Plug-in Hybrid, seamlessly combining eco-consciousness with unparalleled comfort. Redefining opulence, it offers a silent glide through city streets, empowered by cutting-edge technology and a commitment to a greener future."
    },
    { 
        name: "BMW M4 Competition", 
        category: "new vehicles", 
        model: "BMW M4 Competition", 
        price: "$113,000", 
        kilometers: "90,000 km", 
        engineType: "petrol", 
        gearbox: "Automatic", 
        image: "images/bmw cards/m4cardimg.jpg", 
        demo:"cardemo5.php",
        description: "Unleash the beast within with the BMW M4 Competition, where raw power meets refined precision, sculpted for the ultimate driving experience on both road and track. Pushing boundaries with its adrenaline-pumping performance and iconic design, it's the epitome of automotive excellence, redefining the art of exhilaration behind the wheel."
    },
    { 
        name: "BMW M5 CS", 
        category: "new vehicles", 
        model: "BMW M5 CS", 
        price: "$142,000", 
        kilometers: "25,000 km", 
        engineType: "petrol", 
        gearbox: "Automatic", 
        image: "images/bmw cards/bmw m5CS.jpg", 
        demo:"cardemo6.php",
        description: "Experience the pinnacle of performance luxury with the BMW M5 CS, where relentless power meets refined elegance, delivering an unparalleled driving thrill. Precision-engineered to dominate both road and track, it embodies the epitome of automotive excellence, setting new standards in exhilaration and sophistication."
    },
];

function applyFilters() {
    var filter1Value = document.getElementById("filter1").value;
    var filter2Value = document.getElementById("filter2").value;
    var filter3Value = document.getElementById("filter3").value;
    var filter4Value = document.getElementById("filter4").value;
    var filter5Value = document.getElementById("filter5").value;
    var filter6Value = document.getElementById("filter6").value; 

    var filteredProducts = products.filter(function(product) {
        var filter1Match = filter1Value === "" || product.category === filter1Value;
        var filter2Match = filter2Value === "" || product.model === filter2Value;
        var filter3Match = filter3Value === "" || checkPriceRange(product.price, filter3Value); //Price
        var filter4Match = filter4Value === "" || checkKilometers(product.kilometers, filter4Value); //Kilometrat
        var filter5Match = filter5Value === "" || product.engineType === filter5Value;
        var filter6Match = filter6Value === "" || product.gearbox === filter6Value;

        return filter1Match && filter2Match && filter3Match && filter4Match && filter5Match && filter6Match;
    });
    displayProducts(filteredProducts);
}

function displayProducts(products) {
    var productContainer = document.getElementById("productContainer");
    var noResultsMessage = document.getElementById("noResultsMessage");

    // E fshin previous content
    productContainer.innerHTML = "";
    // E bon check a ka sene Tfiltrune
    if (products.length === 0) {
        noResultsMessage.style.display = "block";
    } else {
        noResultsMessage.style.display = "none";
        
        products.forEach(function(product) {
            var productCard = document.createElement("div");
            productCard.classList.add("col-lg-4", "col-md-4", "col-sm-6", "col-xs-12", "pb-2", "pt-2");

            // Construct the dynamic HTML content for the product card
            productCard.innerHTML = `
                <div class="card-sl" style="margin-top:52px">
                    <div class="card-image">
                        <img src="${product.image}" alt="${product.name}" />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted"><i class="fa fa-dashboard"></i> ${product.kilometers}</strong>
                        <strong class="text-muted"><i class="fa fa-cube"></i> ${product.engineType}</strong>
                        <strong class="text-muted"><i class="fa fa-cog"></i> ${product.gearbox}</strong>
                    </div>
                    <div class="card-heading">${product.name}</div>
                    <div class="card-text">${product.description}</div>
                    <div class="card-text">${product.price}</div>
                    <a href="${product.demo}" class="card-button">Purchase</a>
                </div>`;

            productContainer.appendChild(productCard);
        });
    }
}

// funksioni per price
function checkPriceRange(price, filterValue) {
    var ranges = {
        "priceRange1": [20000, 50000],
        "priceRange2": [50000, 100000],
        "priceRange3": [100000, Infinity]
    };
    var priceRange = ranges[filterValue];
    if (priceRange) {
        var priceValue = parseInt(price.replace(/[^0-9.-]+/g, ""));
        return priceValue >= priceRange[0] && priceValue <= priceRange[1];
    }
    return false;
}

//funksioni per kilometra
function checkKilometers(kilometers, filterValue) {
    var ranges = {
        "kmRange1": [0, 50000],
        "kmRange2": [50001, 100000],
        "kmRange3": [100001, Infinity]
    };
    var kilometersRange = ranges[filterValue];
    if (kilometersRange) {
        var kilometersValue = parseInt(kilometers.replace(/[^0-9.-]+/g, ""));
        return kilometersValue >= kilometersRange[0] && kilometersValue <= kilometersRange[1];
    }
    return false;
}