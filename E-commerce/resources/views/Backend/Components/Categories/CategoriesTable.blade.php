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
            editePopUp(id);
        });

        $('.delete').on('click', function() {
            const id = $(this).data('id');
            deleteAlertPopUp(id);
        });
    }
</script>