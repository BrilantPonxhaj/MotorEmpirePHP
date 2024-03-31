
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

    // Clear previous content
    while (productContainer.firstChild) {
        productContainer.removeChild(productContainer.firstChild);
    }

    // Add the static HTML part before the dynamic product cards
    var containerDiv = document.createElement("div");
    containerDiv.classList.add("container");
    containerDiv.style.marginTop = "50px";

    var rowDiv = document.createElement("div");
    rowDiv.classList.add("row");

    containerDiv.appendChild(rowDiv);
    productContainer.appendChild(containerDiv);

    // Check if there are any products to display
    if (products.length === 0) {
        noResultsMessage.style.display = "block";
    } else {
        noResultsMessage.style.display = "none";

        // Generate product cards for each product
        products.forEach(function(product) {
            var productCard = document.createElement("div");
            productCard.classList.add("col-lg-4", "col-md-4", "col-sm-6", "col-xs-12", "pb-2", "pt-2");

            var cardSlDiv = document.createElement("div");
            cardSlDiv.classList.add("card-sl");

            var cardImageDiv = document.createElement("div");
            cardImageDiv.classList.add("card-image");

            var image = document.createElement("img");
            image.src = product.image;
            image.alt = product.name;

            cardImageDiv.appendChild(image);
            cardSlDiv.appendChild(cardImageDiv);

            var detailsDiv = document.createElement("div");
            detailsDiv.classList.add("d-flex", "justify-content-around", "mt-2");

            var mileageStrong = document.createElement("strong");
            mileageStrong.classList.add("text-muted");
            mileageStrong.innerHTML = `<i class="fa fa-dashboard"></i> ${product.kilometers}`;

            var engineStrong = document.createElement("strong");
            engineStrong.classList.add("text-muted");
            engineStrong.innerHTML = `<i class="fa fa-cube"></i> ${product.engineType}`;

            var gearboxStrong = document.createElement("strong");
            gearboxStrong.classList.add("text-muted");
            gearboxStrong.innerHTML = `<i class="fa fa-cog"></i> ${product.gearbox}`;

            detailsDiv.appendChild(mileageStrong);
            detailsDiv.appendChild(engineStrong);
            detailsDiv.appendChild(gearboxStrong);

            cardSlDiv.appendChild(detailsDiv);

            var headingDiv = document.createElement("div");
            headingDiv.classList.add("card-heading");
            headingDiv.textContent = product.name;

            var descriptionDiv = document.createElement("div");
            descriptionDiv.classList.add("card-text");
            descriptionDiv.textContent = product.description;

            var priceDiv = document.createElement("div");
            priceDiv.classList.add("card-text");
            priceDiv.textContent = product.price;

            var purchaseLink = document.createElement("a");
            purchaseLink.href = product.demo;
            purchaseLink.classList.add("card-button");
            purchaseLink.textContent = "Purchase";

            cardSlDiv.appendChild(headingDiv);
            cardSlDiv.appendChild(descriptionDiv);
            cardSlDiv.appendChild(priceDiv);
            cardSlDiv.appendChild(purchaseLink);

            productCard.appendChild(cardSlDiv);

            rowDiv.appendChild(productCard);
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