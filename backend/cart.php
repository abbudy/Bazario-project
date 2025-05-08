<input type="text" id="searchInput" placeholder="Search products...">
<select id="categoryFilter">
    <option value="">All Categories</option>
    <option value="clothing">Clothing</option>
    <option value="jewelry">Jewelry</option>
    <option value="art">Art</option>
</select>
<input type="number" id="minPrice" placeholder="Min price">
<input type="number" id="maxPrice" placeholder="Max price">
<button onclick="searchProducts()">Search</button>

<div id="productResults"></div>