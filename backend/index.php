<!DOCTYPE html>
<html>

<head>
    <title>BAZARIO - Products</title>
    <style>
    .product {
        border: 1px solid #ccc;
        padding: 10px;
        margin: 10px;
    }
    </style>
</head>

<body>
    <h1>Product Listings</h1>
    <div id="product-container"></div>

    <script>
    fetch("backend/get_products.php")
        .then(response => response.json())
        .then(products => {
            const container = document.getElementById("product-container");
            products.forEach(product => {
                const div = document.createElement("div");
                div.className = "product";
                div.innerHTML = `
            <h3>${product.title}</h3>
            <p>${product.description}</p>
            <p><strong>$${product.price}</strong></p>
            <p>Category: ${product.category}</p>
            <img src="${product.image}" width="100" />
          `;
                container.appendChild(div);
            });
        });
    </script>
</body>

</html>