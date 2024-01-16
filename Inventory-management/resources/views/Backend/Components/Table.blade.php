<div>
    <table id="tableData">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableList">
            <tr>
                <td>1</td>
                <td>Shovon</td>
                <td>sho@</td>
                <td>0123</td>
                <td>
                    <button class="edite">Edite</button> <span class="btnDevider">|</span>
                    <button class="delete">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="paginate">
        <button class="next">Next</button> <span></span>
        <button class="prev">Prev</button>
    </div>
</div>

<script>
    getData();

    async function getData() {
        showLoader();
        let res = await axios.get('/admin/categories');
        hideLoader();

        let tableData = document.querySelector("#tableData");
        let tableList = document.querySelector("#tableList");
        
        res.data.forEach(function(items,index) {
            let row = `<tr>
                            <td></td>
                        </tr>`
        
                        tableList.append(row);
        });
    }
</script>