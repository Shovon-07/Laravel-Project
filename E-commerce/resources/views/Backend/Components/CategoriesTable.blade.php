<div data-bs-theme="dark" style="margin-top: 50px">
    <div style="text-align: right">
        <button class="button" style="padding: 10px 20px;margin-bottom:20px" onclick="showPopUp()">Create Category</button>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th>Sl no</th>
                <th>Category name</th>
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
    window.addEventListener('load', () => {
        categoryList();
    });

    async function categoryList() {
        showLoader();
        const response = await axios.get("/admin/category-list");
        hideLoader();

        let table = $("#table");
        let tableData = $("#tableData");

        table.DataTable().destroy();
        tableData.empty();

        const data = response.data['categories'];
        let count = 1;
        data.forEach((items) => {
            let row = `<tr>
                <td>${count++}</td>
                <td>${items['CategoryName']}</td>
                <td>
                    <button data-id="${items['id']}" class="edite">Edite</button> <span class="btnDevider">|</span>
                    <button data-id="${items['id']}" class="delete">Delete</button>
                </td>
            </tr>`;

            tableData.append(row);
        });

        new DataTable(table, {
            order: [0, "desc"],
            lengthMenu: [2,4,6],
        });

        $('.edite').on('click', function() {
            const id = $(this).data('id');
            console.log(id);
        });

        $('.delete').on('click', function() {
            const id = $(this).data('id');
            console.log(id);
            deleteAlertPopUp(id);
        });
    }
</script>

{{-- <script>
    getData();

    async function getData() {
        showLoader();
        let res = await axios.get("/admin/categories");
        hideLoader();

        let table = $("#table");
        let tableData = $("#tableData");

        table.DataTable().destroy();
        tableData.empty();

        let count = 1;
        let data = res.data['categories'];
        data.forEach(function (item, index) {
            let row = `<tr>
                <td>${count++}</td>
                <td>${item['category_name']}</td>
                <td>
                    <button data-id="${item['id']}" class="edite">Edite</button> <span class="btnDevider">|</span>
                    <button data-id="${item['id']}" class="delete">Delete</button>
                </td>
            </tr>`;

            tableData.append(row);
        });

        new DataTable(table, {
            order: [0, "desc"],
            lengthMenu: [5,10,15],
        });

        // Edite
        $('.edite').on('click', function() {
            const id = $(this).data('id');
            console.log(id);
        });

        // Delete
        $('.delete').on('click', function() {
            const id = $(this).data('id');
            showDeleteCategoryPopUp(id);
        });
    }
</script> --}}