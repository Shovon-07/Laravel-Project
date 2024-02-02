<div data-bs-theme="dark" style="margin-top: 20px">
    <div class="d-flex" style="justify-content: space-between;margin-bottom:30px">
        <div>
            <select id="selectCategoryForProduct" class="selectField" onchange="getCategoryOptionsValue()">
                <option selected>Select category</option>
                {{-- <option value="">Select category</option>
                <option value="">Category 1</option>
                <option value="">Category 2</option>
                <option value="">Category 3</option> --}}
            </select>
        </div>

        <div>
            <select id="selectBrandForProduct" class="selectField" onchange="getBrandOptionsValue()">
                <option selected>Select brand</option>
                {{-- <option value="">Select category</option>
                <option value="">Brand 1</option>
                <option value="">Brand 2</option>
                <option value="">Brand 3</option> --}}
            </select>
        </div>
    
        <div>
            <button class="button" style="padding: 10px 20px;" onclick="createProductPopUp(categoryIdForProduct,brandIdForProduct)">Add new product</button>
        </div>
    </div>

    <table id="table">
        <thead>
            <tr>
                <th>Sl no</th>
                <th>Products title</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableData">
            {{-- <tr>
                <td>1</td>
                <td>shovon</td>
                <td>
                    <button data-id="${item['id']}" class="edite">Edite</button> <span class="btnDevider">|</span>
                    <button data-id="${item['id']}" class="delete">Delete</button>
                </td>
            </tr> --}}
        </tbody>
    </table>
</div>

<script>
    let categoryIdForProduct = "";
    let brandIdForProduct = "";

    window.addEventListener('load', () => {
        categoryListForProduct();
    });

    async function categoryListForProduct() {
        // showLoader();
        const response = await axios.get("/admin/category-list");
        // hideLoader();

        let selectCategoryForProduct = $('#selectCategoryForProduct');

        const data = response.data['categories'];
        data.forEach((items) => {
            let row = 
            `
                <option value="${items['id']}">${items['CategoryName']}</option>
            `;

            selectCategoryForProduct.append(row);
        });
    }

    async function brandListForProduct() {
        // showLoader();
        // const response = await axios.get("/admin/brands-list-for-product");
        const response = await axios.post("/admin/brands-list", {
            "categoryId" : categoryIdForProduct
        });
        // hideLoader();

        let selectBrandForProduct = $('#selectBrandForProduct');
        // selectBrandForProduct.empty();

        const data = response.data['brands'];
        data.forEach((items) => {
            let row = 
            `
                <option value="${items['id']}">${items['BrandName']}</option>
            `;

            selectBrandForProduct.append(row);
        });
    }

    function getCategoryOptionsValue() {
        categoryIdForProduct = $("#selectCategoryForProduct").val();
        brandListForProduct();
    }

    function getBrandOptionsValue() {
        brandIdForProduct = $("#selectBrandForProduct").val();
        productList();
    }

    async function productList() {
        showLoader();
        const response = await axios.post("/admin/product-list", {
            "categoryId" : categoryIdForProduct,
            "brandId" : brandIdForProduct
        });
        hideLoader();

        let table = $("#table");
        let tableData = $("#tableData");

        table.DataTable().destroy();
        tableData.empty();

        const data = response.data['products'];
        let count = 1;
        data.forEach((items) => {
            let row = `<tr>
                <td>${count++}</td>
                <td>${items['ProductTitle']}</td>
                <td>${items['ProductPrice']}</td>
                <td>${items['ProductStock']}</td>
                <td>${items['ProductImg']}</td>
                <td>
                    <button data-id="${items['id']}" class="edite">Edite</button>
                    <span class="btnDevider">|</span>
                    <button data-id="${items['id']}" class="delete">Delete</button>
                </td>
            </tr>`;

            tableData.append(row);
        });

        new DataTable(table, {
            order: [0, "desc"],
            lengthMenu: [5,10,15,20],
        });

        $('.edite').on('click', function() {
            const id = $(this).data('id');
            // const data = $(this).data('data');
            editProductPopUp(id, categoryIdForProduct, brandIdForProduct);
            console.log(id, categoryIdForProduct, brandIdForProduct);
        });

        $('.delete').on('click', function() {
            const id = $(this).data('id');
            deleteProductPopUp(id, categoryIdForProduct, brandIdForProduct);
        });
    }
</script>