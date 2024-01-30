<div data-bs-theme="dark" style="margin-top: 20px">
    <div class="d-flex" style="justify-content: space-between;margin-bottom:30px">
        <div>
            <select id="selectItems" class="selectField" onchange="getOptionsValue()">
                <option selected>Select category</option>
                {{-- <option value="">Select category</option>
                <option value="">Category 1</option>
                <option value="">Category 2</option>
                <option value="">Category 3</option> --}}
            </select>
        </div>
    
        <div>
            <button class="button" style="padding: 10px 20px;" onclick="createBrandPopUp(categoryIdForBrand)">Add new brand</button>
        </div>
    </div>

    <table id="table">
        <thead>
            <tr>
                <th>Sl no</th>
                <th>Brand name</th>
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
    let categoryIdForBrand = "";

    window.addEventListener('load', () => {
        categoryList();
    });

    async function categoryList() {
        showLoader();
        const response = await axios.get("/admin/category-list");
        hideLoader();

        let selectItems = $('#selectItems');

        const data = response.data['categories'];
        let count = 1;
        data.forEach((items) => {
            let row = 
            `
                <option value="${items['id']}">${items['CategoryName']}</option>
            `;

            selectItems.append(row);
        });
    }

    function getOptionsValue() {
        categoryIdForBrand = $("#selectItems").val(); 
        brandList();
    } 

    async function brandList() {
        showLoader();
        const response = await axios.post("/admin/brands-list", {
            "categoryId" : categoryIdForBrand
        });
        hideLoader();

        let table = $("#table");
        let tableData = $("#tableData");

        table.DataTable().destroy();
        tableData.empty();

        const data = response.data['brands'];
        let count = 1;
        data.forEach((items) => {
            let row = `<tr>
                <td>${count++}</td>
                <td>${items['BrandName']}</td>
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
            editBrandPopUp(id);
        });

        $('.delete').on('click', function() {
            const id = $(this).data('id');
            deleteBrandPopUp(id);
        });
    }
</script>