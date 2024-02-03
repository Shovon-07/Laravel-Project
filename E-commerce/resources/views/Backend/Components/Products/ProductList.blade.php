<div data-bs-theme="dark" style="margin-top: 20px">
    <div style="text-align: right">
        <button class="button" style="padding: 10px 20px;margin-bottom:20px" onclick="createProductPopUp()">Add new product</button>
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
    window.addEventListener('load', () => {
        productList();
    });

    async function productList() {
        showLoader();
        const response = await axios.get("/admin/product-list");
        hideLoader();

        let table = $("#table");
        let tableData = $("#tableData");
        const imgPath = "{{asset('Uploaded_file')}}";

        table.DataTable().destroy();
        tableData.empty();

        response.data.forEach((items,index) => {
            let row = `<tr>
                <td>${index+1}</td>
                <td>${items['ProductTitle']}</td>
                <td>${items['ProductPrice']}</td>
                <td>${items['ProductStock']}</td>
                <td><img class="productImg" src="${imgPath}/${items['ProductImg']}"></td>
                <td class="columnStyleBtn">
                    <button data-id="${items['id']}" data-path="${items['ProductImg']}" class="edite">Edite</button>
                    <button data-id="${items['id']}" data-path="${items['ProductImg']}" class="delete">Delete</button>
                </td>
            </tr>`;

            tableData.append(row);
        });

        $('.edite').on('click', async function() {
            const id = $(this).data('id');
            const imgPath = $(this).data('path');
            await fillProductEditForm(id);
            editProductPopUp(id,imgPath);
        });

        $('.delete').on('click', function() {
            const id = $(this).data('id');
            const imgPath = $(this).data('path');
            deleteProductPopUp(id, imgPath);
        });

        new DataTable(table, {
            order: [0, "desc"],
            lengthMenu: [5,10,15,20],
        });
    }
</script>