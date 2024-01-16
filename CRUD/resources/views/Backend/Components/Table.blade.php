<div>
    <table>
        <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tableData">
            <tr>
                <td>1</td>
                <td>${name}</td>
                <td>${email}</td>
                <td>${mobile}</td>
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
    <p class="t">s</p>
</div>

<script>
    window.addEventListener("load", ()=>{
        getData();
    })

    async function getData() {
        let tableData = document.querySelector('#tableData');
        let i = 1;

        let res = await axios.get('/getdata');
        
        res.forEach(element => {
            i++;
            let name = element.data['name'];
            let email = element.data['email'];
            let mobile = element.data['mobile'];
        
            tableData.innerHTML = `<tr>
                <td>1</td>
                <td>${name}</td>
                <td>${email}</td>
                <td>${mobile}</td>
                <td>
                    <button class="edite">Edite</button> <span class="btnDevider">|</span>
                    <button class="delete">Delete</button>
                </td>
            </tr>`

        });

    }
</script>