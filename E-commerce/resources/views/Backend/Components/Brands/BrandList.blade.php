<div data-bs-theme="dark" style="margin-top: 20px">
    <div style="text-align: right">
        <button class="button" style="padding: 10px 20px;margin-bottom:20px" onclick="createBrandPopUp()">Add new brand</button>
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
    window.addEventListener('load', () => {
        brandList();
    });

    async function brandList() {
        showLoader();
        const response = await axios.get("/admin/brand-list");
        hideLoader();

        let table = $("#table");
        let tableData = $("#tableData");

        table.DataTable().destroy();
        tableData.empty();

        // const data = response.data['brands'];
        response.data.forEach((items,index) => {
            let row = `<tr>
                <td>${index+1}</td>
                <td>${items['BrandName']}</td>
                <td>
                    <button data-id="${items['id']}" class="edite">Edite</button>
                    <span class="btnDevider">|</span>
                    <button data-id="${items['id']}" class="delete">Delete</button>
                </td>
            </tr>`;

            tableData.append(row);
        });

        $('.edite').on('click', async function() {
            const id = $(this).data('id');
            await fillBrandEditForm(id);
            editBrandPopUp(id);
            console.log(id);
        });

        $('.delete').on('click', function() {
            const id = $(this).data('id');
            deleteBrandPopUp(id);
        });

        new DataTable(table, {
            order: [0, "desc"],
            lengthMenu: [3,5,10,15,20],
        });
    }
</script>